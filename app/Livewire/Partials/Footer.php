<?php

namespace App\Livewire\Partials;

use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $settings = Setting::first();
        return view('livewire.partials.footer', ['settings' => $settings]);
    }
}