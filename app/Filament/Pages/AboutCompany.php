<?php

namespace App\Filament\Pages;

use App\Models\About;
use Filament\Actions\Action;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Support\Exceptions\Halt;

class AboutCompany extends Page
{
    use InteractsWithForms;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static string $view = 'filament.pages.about-company';

    protected static ?string $title = 'Sobre a Empresa';

    protected static ?string $navigationGroup = "Páginas";

    protected static ?string $navigationLabel = 'Sobre';

    public function mount(): void
    {
        $aboutData = About::first();
        if (is_null($aboutData)) {
            $this->form->fill();
        } else {
            $this->form->fill($aboutData->toArray());
        }
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nome da Página')
                            ->placeholder('Sobre a Empresa')
                            ->rules(['required']),
                        Forms\Components\Textarea::make('summary')
                            ->label('Breve descrição ou Citação')
                            ->rules(['required'])
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('content')
                            ->label('Descrição completa')
                            ->rules(['required'])
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('featured')
                            ->disk('public')
                            ->directory('about')
                            ->visibility('public')
                            ->label('Imagem destacada')
                            ->image()
                    ]),
            ])->statePath('data');
    }

    public function save(About $about): void
    {
        try {
            $aboutData = About::first();
            $data = $this->form->getState();
            if (is_null($aboutData)) {
                About::create($data);
            } else {
                $about->where('id', $aboutData->id)->update($data);
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title('Dados Salvos')
            ->body('Os dados sobre a empresa foram salvos com sucesso.')
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
