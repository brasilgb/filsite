<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class ContactPage extends Component
{
    public function mount(){
        $aboutSEO = Contact::first();
        $momeSEO = Setting::first();
        SEOMeta::setTitle(is_null($aboutSEO) ? '' : $aboutSEO->title);
        SEOMeta::setDescription(is_null($aboutSEO) ? '' : $aboutSEO->summary);
        SEOMeta::addKeyword(is_null($momeSEO) ? '' : $momeSEO->metakeyword);
    } 
    
    public function render()
    {
        $contact = Contact::first();
        $settings = Setting::first();
        return view('livewire.contact-page',['contact' => $contact, 'settings' => $settings]);
    }
}
