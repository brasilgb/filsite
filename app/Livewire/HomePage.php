<?php

namespace App\Livewire;

use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class HomePage extends Component
{
    public $numwhats;
    public function mount(){
        $momeSEO = Setting::first();
        SEOMeta::setTitle(is_null($momeSEO) ? '' : $momeSEO->metatitle);
        SEOMeta::setDescription(is_null($momeSEO) ? '' : $momeSEO->metadescription);
        SEOMeta::addKeyword(is_null($momeSEO) ? '' : $momeSEO->metakeyword);
        $this->numwhats = is_null($momeSEO) ? '' : $momeSEO->whatsapp;
    }
    
    public function render()
    {
        return view('livewire.home-page');
    }
}
