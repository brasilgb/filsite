<?php

namespace App\Livewire;

use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class HomePage extends Component
{
    public function mount(){
        $momeSEO = Setting::first();
        SEOMeta::setTitle($momeSEO->metatitle);
        SEOMeta::setDescription($momeSEO->metadescription);
        SEOMeta::addKeyword($momeSEO->metakeyword);
    }
    
    public function render()
    {
        return view('livewire.home-page');
    }
}
