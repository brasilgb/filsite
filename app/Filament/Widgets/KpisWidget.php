<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KpisWidget extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Usuários', User::count())
            ->description('Usuários e clientes')
            ->descriptionIcon('heroicon-o-users', IconPosition::Before)
            ->color('success'),
            Stat::make('Categorias', Category::count())
            ->description('Categorias produtos e serviços')
            ->descriptionIcon('heroicon-o-tag', IconPosition::Before)
            ->color('danger'),
            Stat::make('Serviços', Service::count())
            ->description('Nossos serviços')
            ->descriptionIcon('heroicon-o-wrench-screwdriver', IconPosition::Before)
            ->color('info'),
            Stat::make('Produtos', Product::count())
            ->description('Nossos produtos')
            ->descriptionIcon('heroicon-o-device-phone-mobile', IconPosition::Before)
            ->color('warning'),
        ];
    }
}
