<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class ContactPage extends Component
{
    public function render()
    {
        $contact = Contact::first();
        $settings = Setting::first();
        return view('livewire.contact-page',['contact' => $contact, 'settings' => $settings]);
    }
}
