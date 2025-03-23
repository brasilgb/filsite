<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ProductPage extends Component
{
    public $active;
    public $catSelected = null;

    public function render()
    {
        $categories = Category::with('products')->where('type', 'product')->get();
        $products = Category::with('products')->where('type', 'product')->orderBy('id', 'DESC')->get();
        $active2 = Category::with('products')->where('type', 'product')->where('category_id', '<>', null)->orderBy('id', 'ASC')->first();
        $allproducts = Category::with('products')->where('id', $this->catSelected)->get();
        return view('livewire.product-page', ['categories' => $categories, 'products' => $products, 'active2' => $active2 ? $active2->id : [], 'allproducts' => $allproducts]);
    }
}
