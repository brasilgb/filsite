<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Contact extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-wifi';

    protected static string $view = 'filament.pages.contact';

    protected static ?string $navigationGroup = "Páginas";

    protected static ?string $navigationLabel = 'Contato';
}
