<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class About extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static string $view = 'filament.pages.about';

    protected static ?string $navigationGroup = "Páginas";

    protected static ?string $navigationLabel = 'Sobre';
}
