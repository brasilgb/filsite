<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Livewire\Component;

class ItemPage extends Component
{
    public function mount(Request $request){
        $slug = $request->slug;
        $product = Product::where('slug', $slug)->first();

        SEOTools::setTitle($product->title);
        SEOTools::setDescription($product->summary);
        SEOTools::opengraph()->setTitle($product->title);
        SEOTools::opengraph()->setUrl('http://localhost:8000/produtos/detalhes/' . $product->title);
        SEOTools::opengraph()->addProperty('type', 'products');
        SEOTools::opengraph()->addProperty('locale', 'pt-br');
        SEOTools::opengraph()->addProperty('locale:alternate', ['pt-pt', 'en-us']);
        SEOTools::opengraph()->addImage('http://localhost:8000/storage/' . $product->featured, ['height' => 150, 'width' => 300]);
        SEOTools::setCanonical('https://localhost:8000/produtos/detalhes/' . $product->title);
        SEOTools::jsonLd()->addImage('http://localhost:8000/storage/' . $product->featured);
    }

    public function render(Request $request)
    {
        $slug = $request->slug;
        $product = Product::where('slug', $slug)->first();
        $categories = Category::with('products')->where('type', 'product')->get();
        return view('livewire.item-page', ['product' => $product, 'categories' => $categories]);
    }
}
