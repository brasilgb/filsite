<?php

namespace App\Filament\Cliente\Widgets;

use App\Models\Order;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class KpiCustomer extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Ordens Abertas', Order::where('client_id', Auth::user()->id)->where('status', 1)->count())
            ->description('Ordens aguardando para conserto')
            ->descriptionIcon('heroicon-o-wrench-screwdriver', IconPosition::Before)
            ->color('danger'),
            Stat::make('Ordens fechadas', Order::where('client_id', Auth::user()->id)->where('status', 8)->count())
            ->description('Ordens fechadas aguardando retirada')
            ->descriptionIcon('heroicon-o-wrench-screwdriver', IconPosition::Before)
            ->color('success'),
            Stat::make('Orçamentos gerados', Order::where('client_id', Auth::user()->id)->where('status', 3)->count())
            ->description('Orçamentos gerados pela Eplus')
            ->descriptionIcon('heroicon-o-wrench-screwdriver', IconPosition::Before)
            ->color('info'),

        ];
    }
}
