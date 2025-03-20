<?php

namespace App\Livewire\Partials;

use App\Models\Slider;
use Livewire\Component;

class Slide extends Component
{
    public function render()
    {
        $sliders = Slider::where('active', 1)->get();
        return view('livewire.partials.slide', ['sliders' => $sliders]);
    }
}
