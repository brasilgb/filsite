<?php

namespace App\Livewire;

use App\Mail\FedbackMail;
use Filament\Resources\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ContactForm extends Component
{

    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|min:3|max:255',
        'message' => 'required|string|min:3|max:1000'
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send(Request $request)
    {

        $validateDate = $this->validate();
        try {
            Mail::to('contato@eplusteutonia.com.br')->send(new FedbackMail($validateDate));
            Session()->flash('success', 'Mensagem enviada com sucesso!');
        } catch (\Throwable $th) {
            Session()->flash('error', 'Falha ao enviar mensagem. Por favor tente mais tarde!');
        }


        $this->reset();
    }
}
