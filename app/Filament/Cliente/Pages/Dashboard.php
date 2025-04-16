<?php

namespace App\Filament\Cliente\Pages;

use Filament\Pages\Dashboard as PagesDashboard;

class Dashboard extends PagesDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.cliente.pages.dashboard';

    protected static ?int $navigationSort = -2;
}
