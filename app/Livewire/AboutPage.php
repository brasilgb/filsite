<?php

namespace App\Livewire;

use App\Models\About;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class AboutPage extends Component
{
    public function mount(){
        $aboutSEO = About::first();
        $momeSEO = Setting::first();
        SEOMeta::setTitle(is_null($aboutSEO) ? '' : $aboutSEO->title);
        SEOMeta::setDescription(is_null($aboutSEO) ? '' : $aboutSEO->summary);
        SEOMeta::addKeyword(is_null($momeSEO) ? '' : $momeSEO->metakeyword);
    }
    
    public function render()
    {
        $about = About::first();
        return view('livewire.about-page',['about' => $about]);
    }
}
