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

        SEOTools::opengraph()->setTitle($product->title);
        SEOTools::opengraph()->setDescription($product->summary);
        SEOTools::opengraph()->setUrl('https://eplusteutonia.com.br/produtos/detalhes/' . $product->title);
        SEOTools::opengraph()->addImage('https://eplusteutonia.com.br/storage/' . $product->featured, ['height' => 1200, 'width' => 630]);
        SEOTools::opengraph()->addProperty('locale', 'pt-br');
    }

    public function render(Request $request)
    {
        $slug = $request->slug;
        $product = Product::where('slug', $slug)->first();
        $categories = Category::with('products')->where('type', 'product')->get();
        return view('livewire.item-page', ['product' => $product, 'categories' => $categories]);
    }
}
