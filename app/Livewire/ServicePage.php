<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ServicePage extends Component
{

    public $allservices = [];
    public $active;
    public function servicesall($id)
    {
        $this->active = $id;
        $this->allservices = Category::with('services')->where('id', $id)->get();
    }

    public function render()
    {
        $categories = Category::with('services')->where('type', 'service')->get();
        $active2 = Category::with('services')->where('type', 'service')->where('category_id', '<>', null)->orderBy('id', 'ASC')->first();
        $services = Category::with('services')->where('type', 'service')->where('id', $active2->id)->get();
        $categoryActive = Category::where('id', $this->active ? $this->active : $active2->id)->first();
        return view('livewire.service-page', ['categories' => $categories, 'services' => $services, 'active2' => $active2 ? $active2->id : [], 'categoryActive' => $categoryActive]);
    }
}
