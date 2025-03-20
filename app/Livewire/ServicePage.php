<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ServicePage extends Component
{
    public function render()
    {
        $categories = Category::with('services')->where('type', 'service')->get();

        return view('livewire.service-page', ['categories' => $categories]);
    }
}
