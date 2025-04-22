<?php

namespace App\Livewire\Partials;

use App\Models\Product;
use App\Models\Setting;
use Livewire\Component;

class Products extends Component
{
    public $numwhats;

    public function mount(){
        $momeSEO = Setting::first();
        $this->numwhats = is_null($momeSEO) ? '' : $momeSEO->whatsapp;
    }
    public function render()
    {
        $products = Product::where('active', 1)->where('home', 1)->get();
        return view('livewire.partials.products', ['products' => $products]);
    }
}
