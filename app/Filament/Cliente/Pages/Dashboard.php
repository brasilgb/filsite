<?php

namespace App\Filament\Cliente\Pages;

use App\Filament\Cliente\Widgets\KpiCustomer;
use Filament\Pages\Dashboard as PagesDashboard;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends PagesDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.cliente.pages.dashboard';

    protected static ?int $navigationSort = -2;

    protected static ?string $modelLabel = 'Dashboard';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $title = '';

    public function getTitle(): string | Htmlable
    {
        return __('Custom Page Title');
    }
    protected function getHeaderWidgets(): array
    {
        return [
            KpiCustomer::class
        ];
    }
}
