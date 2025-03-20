<?php

namespace App\Livewire\Partials;

use App\Models\Brand as ModelsBrand;
use Livewire\Component;

class Brand extends Component
{
    public function render()
    {
        $brands = ModelsBrand::get();
        return view('livewire.partials.brand', ['brands' => $brands]);
    }
}
