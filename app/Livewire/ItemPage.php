<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ItemPage extends Component
{

    public $numwhats;
    public function mount(Request $request)
    {
        $slug = $request->slug;
        $product = Product::where('slug', $slug)->first();
        $momeSEO = Setting::first();
        $this->numwhats = $momeSEO->whatsapp;

        SEOTools::setCanonical('https://eplusteutonia.com.br/produtos/detalhes/' . $product->slug);
        SEOTools::opengraph()->setTitle($product->title);
        SEOTools::opengraph()->setDescription($product->summary);
        SEOTools::opengraph()->setUrl('https://eplusteutonia.com.br/produtos/detalhes/' . $product->slug);
        SEOTools::opengraph()->addImage('https://eplusteutonia.com.br/storage/' . $product->featured);
        SEOTools::opengraph()->addProperty('locale', 'pt-br');
        SEOTools::opengraph()->addProperty('type', 'website');
    }

    public function render(Request $request)
    {
        $slug = $request->slug;
        $product = Product::with('categories')->where('slug', $slug)->first();

        $categories = Category::with('products')->where('type', 'product')->get();
        return view('livewire.item-page', ['product' => $product, 'categories' => $categories, 'slug' => $slug]);
    }
}
