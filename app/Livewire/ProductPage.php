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
    public $search="";
    public $watsapp="";

    public function mount(){
        $momeSEO = Setting::first();
        SEOMeta::setTitle($momeSEO->metatitle);
        SEOMeta::setDescription($momeSEO->metadescription);
        SEOMeta::addKeyword($momeSEO->metakeyword);
        $this->watsapp = $momeSEO->whatsapp;
    }
    public function render()
    {
        $searchresult = [];
        if(strlen($this->search) >=1){
            $searchresult = Product::where('title', 'like', '%'.$this->search.'%')->where('active', 1)->limit(10)->get();
        }

        $categories = Category::with('products')->where('type', 'product')->get();
        $active2 = Category::with('products')->where('type', 'product')->where('category_id', '<>', null)->orderBy('id', 'ASC')->first();
        $products = Category::with('products')->where('type', 'product')->where('id', $active2->id)->get();
        $allproducts = Category::with('products')->where('id', $this->catSelected)->get();
        $categoryActive = Category::where('id', $this->catSelected ? $this->catSelected : $active2->id)->first();

        return view('livewire.product-page', ['categories' => $categories, 'products' => $products, 'searchresult' => $searchresult, 'active2' => $active2 ? $active2->id : [], 'allproducts' => $allproducts, 'categoryActive' => $categoryActive]);
    }
}
