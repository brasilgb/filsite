<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class SettingCompany extends Page
{
    use InteractsWithForms;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';

    protected static string $view = 'filament.pages.setting-company';

    protected static ?string $title = 'Ajustes';

    protected static ?string $navigationGroup = "Configurações";

    protected static ?string $navigationLabel = 'Ajustes do Site';

    public function mount(): void
    {
        $settingData = Setting::first();
        if (is_null($settingData)) {
            $this->form->fill();
        } else {
            $this->form->fill($settingData->toArray());
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Dados da empresa')
                            ->schema([
                                Forms\Components\FileUpload::make('logo')
                                    ->label('Logotipo')
                                    ->image(),
                                Forms\Components\TextInput::make('title')
                                    ->label('Nome do site')
                                    ->rules(['required']),
                                Forms\Components\Textarea::make('description')
                                    ->label('Descrição'),
                                Forms\Components\TextInput::make('url')
                                    ->label('URL Site'),
                                Forms\Components\TextInput::make('opening')
                                    ->label('Horário de funcionamento'),
                            ]),
                        Tabs\Tab::make('Localização')
                            ->schema([
                                Forms\Components\TextInput::make('state')
                                    ->label('Estado')
                                    ->rules(['required']),
                                Forms\Components\TextInput::make('city')
                                    ->label('Cidade')
                                    ->rules(['required']),
                                Forms\Components\TextInput::make('neighborhood')
                                    ->label('Bairro')
                                    ->rules(['required']),
                                Forms\Components\TextInput::make('street')
                                    ->label('Logradouro')
                                    ->rules(['required']),
                                Forms\Components\TextInput::make('number')
                                    ->label('Número')
                                    ->rules(['required']),
                                Forms\Components\TextInput::make('complement')
                                    ->label('Complemento')
                                    ->rules(['required']),
                                Forms\Components\Textarea::make('maps')
                                    ->label('Google Maps'),
                            ]),
                        Tabs\Tab::make('Contatos e Redes Sociais')
                            ->schema([
                                Forms\Components\TextInput::make('telephone')
                                    ->mask('(99) 9999-9999')
                                    ->label('Telefone Fixo')
                                    ->rules(['required']),
                                Forms\Components\TextInput::make('celular')
                                    ->mask('(99) 99999-9999')
                                    ->label('Telefone Celular')
                                    ->rules(['required']),
                                Forms\Components\TextInput::make('email')
                                    ->label('E-mail')
                                    ->rules(['required', 'email']),
                                Forms\Components\TextInput::make('whatsapp')
                                    ->label('WatsApp')
                                    ->rules(['required']),
                                Forms\Components\TextInput::make('instagram')
                                    ->label('Instagram'),
                                Forms\Components\TextInput::make('facebook')
                                    ->label('Facebook'),
                                Forms\Components\TextInput::make('redex')
                                    ->label('Twiter(X)'),
                                Forms\Components\TextInput::make('youtube')
                                    ->label('Youtube'),
                            ]),
                        Tabs\Tab::make('CEO')
                            ->schema([
                                Forms\Components\TextInput::make('metatitle')
                                    ->label('Meta Título'),
                                Forms\Components\TextInput::make('metakeyword')
                                    ->label('Meta Palavras Chave'),
                                Forms\Components\TextInput::make('metadescription')
                                    ->label('Meta Descrição'),
                            ]),
                    ])->activeTab(1)
            ])->statePath('data');
    }

    public function save(Setting $setting): void
    {
        try {
            $settingData = Setting::first();
            $data = $this->form->getState();
            if (is_null($settingData)) {
                Setting::create($data);
            } else {
                $setting->where('id', $settingData->id)->update($data);
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title('Dados Salvos')
            ->body('Dados do site salvos com sucesso.')
            ->send();
        //  Notification::make()
        //     ->success()
        //     ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
        //     ->send();
    }

    public function getDataOrder() {
        dd('feito');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('Gravar Ordens no Site')
                ->icon('heroicon-m-pencil-square')
                ->button()
                ->labeledFrom('md'),
            Action::make('Gravar Usuários no Site')
                ->icon('heroicon-m-pencil-square')
                ->button()
                ->action(fn () => $this->getDataOrder())
                ->labeledFrom('md'),
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }
}
