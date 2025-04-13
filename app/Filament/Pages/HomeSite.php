<?php

namespace App\Filament\Pages;

use App\Models\Category;
use App\Models\Home;
use Filament\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class HomeSite extends Page
{
    use InteractsWithForms;
    public ?array $data = [];

    protected static string $view = 'filament.pages.home-site';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $title = 'Página Inicial';

    protected static ?string $navigationGroup = "Páginas";

    protected static ?string $navigationLabel = 'Página Inicial';
    protected static ?string $navigationD = 'Página Inicial';
    protected static bool $shouldRegisterNavigation = false;

    public function mount(): void
    {
        $homeData = Home::first();
        if (is_null($homeData)) {
            $this->form->fill();
        } else {
            $this->form->fill($homeData->toArray());
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\Select::make('section1')
                            ->label('Seção 1')
                            ->rules(['required'])
                            ->options(Category::all()->pluck('name', 'id')),
                        Forms\Components\Select::make('section2')
                            ->label('Seção 2')
                            ->rules(['required'])
                            ->options(Category::all()->pluck('name', 'id')),
                        Forms\Components\Select::make('section3')
                            ->label('Seção 3')
                            ->rules(['required'])
                            ->options(Category::all()->pluck('name', 'id')),
                        Forms\Components\Select::make('section4')
                            ->label('Seção 4')
                            ->rules(['required'])
                            ->options(Category::all()->pluck('name', 'id')),
                        Forms\Components\Select::make('section5')
                            ->label('Seção 5')
                            ->rules(['required'])
                            ->options(Category::all()->pluck('name', 'id'))
                    ]),
            ])->statePath('data');
    }

    public function save(Home $home): void
    {
        try {
            $homeData = Home::first();
            $data = $this->form->getState();
            if (is_null($homeData)) {
                Home::create($data);
            } else {
                $home->where('id', $homeData->id)->update($data);
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title('Dados Salvos')
            ->body('Os dados da página inicial foram salvos com sucesso.')
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
