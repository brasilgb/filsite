<?php

namespace App\Livewire\Partials;

use App\Models\Setting;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        $settings = Setting::first();
        return view('livewire.partials.navbar', ['settings' => $settings ? $settings : []]);
    }
}
