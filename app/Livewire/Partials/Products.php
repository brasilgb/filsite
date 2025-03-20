<?php

namespace App\Livewire\Partials;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $products = Product::where('active', 1)->where('home', 1)->get();
        return view('livewire.partials.products', ['products' => $products]);
    }
}
