<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactPage extends Component
{
    public function render()
    {
        $contact = Contact::first();
        return view('livewire.contact-page',['contact' => $contact]);
    }
}
