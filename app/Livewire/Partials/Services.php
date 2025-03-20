<?php

namespace App\Livewire\Partials;

use App\Models\Category;
use App\Models\Service;
use Livewire\Component;

class Services extends Component
{
    public function render()
    {
        $services = Category::where('active', 1)->where('type', 'service')->where('category_id', '<>', null)->get();
        return view('livewire.partials.services', ['services' => $services]);
    }
}
