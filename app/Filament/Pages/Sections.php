<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Sections extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.sections';

    protected static ?string $navigationGroup = "Páginas";

    protected static ?string $navigationLabel = 'Home';
}
