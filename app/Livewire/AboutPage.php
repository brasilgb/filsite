<?php

namespace App\Livewire;

use App\Models\About;
use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        $about = About::first();
        return view('livewire.about-page',['about' => $about]);
    }
}
