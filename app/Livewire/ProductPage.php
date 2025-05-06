<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class ProductPage extends Component
{
    public $active;
    public $catSelected = null;
    public $search = "";
    public $numwhats;
    public $productDetail;
    protected $listeners = ['ProductPageData'];

    public function mount()
    {
        $momeSEO = Setting::first();
        SEOMeta::setTitle(is_null($momeSEO) ? '' : $momeSEO->metatitle);
        SEOMeta::setDescription(is_null($momeSEO) ? '' : $momeSEO->metadescription);
        SEOMeta::addKeyword(is_null($momeSEO) ? '' : $momeSEO->metakeyword);
        $this->numwhats = is_null($momeSEO) ? '' : $momeSEO->whatsapp;
    }
    
    public function ProductPageData($id)
    {
        dd('$this->listeners', $id);
        $this->productDetail = Product::with('categories')->where('slug', $slug)->first();
        
    }

    public function render()
    {
        $searchresult = [];
        if (strlen($this->search) >= 1) {
            $searchresult = Product::where('title', 'like', '%' . $this->search . '%')->where('active', 1)->limit(10)->get();
        }
        
        $categories = Category::with('products')->where('type', 'product')->get();
        $active2 = Category::with('products')->where('type', 'product')->where('category_id', '<>', null)->orderBy('id', 'ASC')->first();
        $products = Category::with('products')->where('type', 'product')->where('id', $active2->id)->get();
        $allproducts = Category::with('products')->where('id', $this->catSelected)->get();
        $categoryActive = Category::where('id', $this->catSelected ? $this->catSelected : $active2->id)->first();

        return view('livewire.product-page', ['categories' => $categories, 'products' => $products, 'searchresult' => $searchresult, 'active2' => $active2 ? $active2->id : [], 'allproducts' => $allproducts, 'categoryActive' => $categoryActive]);
    }
}
