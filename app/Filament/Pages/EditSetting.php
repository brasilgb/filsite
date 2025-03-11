<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class EditSetting extends Page
{
    use InteractsWithForms;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';

    protected static string $view = 'filament.pages.edit-setting';

    protected static ?string $navigationGroup = "Configurações";

    protected static ?string $navigationLabel = 'Ajustes';

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
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                    ])
            ])
            ->statePath('data');
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
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
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
