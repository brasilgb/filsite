<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Http\Request;
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

    public function render(Request $request)
    {
        $categories = Category::with('services')->where('type', 'service')->get();
        $active2 = Category::with('services')->where('type', 'service')->where('category_id', '<>', null)->orderBy('id', 'ASC')->first();
        $reqId = $request->id ? $request->id : $active2->id;
        $services = Category::with('services')->where('type', 'service')->where('id', $reqId)->get();
        $categoryActive = Category::where('id', $this->active ? $this->active : $reqId)->first();
        return view('livewire.service-page', ['categories' => $categories, 'services' => $services, 'active2' => !$request->id && !$this->active ? $active2->id : [], 'categoryActive' => $categoryActive, 'active3' => $request->id ? $request->id : null]);
    }
}
