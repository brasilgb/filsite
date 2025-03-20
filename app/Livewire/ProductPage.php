<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductPage extends Component
{
    public function render()
    {
        $products = Category::with('products')->where('type', 'product')->get();

        return view('livewire.product-page', ['products' => $products]);
    }
}
