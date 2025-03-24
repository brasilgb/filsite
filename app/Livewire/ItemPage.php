<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;

class ItemPage extends Component
{
    public function render(Request $request)
    {
        $slug = $request->slug;
        $product = Product::where('slug', $slug)->first();
        $categories = Category::with('products')->where('type', 'product')->get();
        return view('livewire.item-page', ['product' => $product, 'categories' => $categories]);
    }
}
