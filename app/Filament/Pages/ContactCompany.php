<?php

namespace App\Filament\Pages;

use App\Models\Contact;
use Filament\Actions\Action;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class ContactCompany extends Page
{
    use InteractsWithForms;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-wifi';

    protected static string $view = 'filament.pages.contact-company';

    protected static ?string $navigationGroup = "Páginas";

    protected static ?string $title = 'Página de Contato';
    protected static ?string $navigationLabel = 'Contato';


    public function mount(): void
    {
        $contactData = Contact::first();
        if (is_null($contactData)) {
            $this->form->fill();
        } else {
            $this->form->fill($contactData->toArray());
        }
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Título da Página')
                            ->live()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->placeholder('Entre em contato conosco')
                            ->rules(['required']),
                        Forms\Components\TextInput::make('slug')
                            ->rules(['required']),
                        Forms\Components\RichEditor::make('content')
                            ->label('Descrição Inicial')
                            ->rules(['required'])
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('featured')
                            ->label('Imagem destacada')
                            ->image()
                    ]),
            ])->statePath('data');
    }

    public function save(Contact $contact): void
    {
        try {
            $contactData = Contact::first();
            $data = $this->form->getState();
            if (is_null($contactData)) {
                Contact::create($data);
            } else {
                $contact->where('id', $contactData->id)->update($data);
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title('Dados Salvos')
            ->body('Os dados do contato foram salvos com sucesso.')
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }
}
