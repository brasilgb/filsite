<?php

namespace App\Filament\Cliente\Pages;

use Filament\Pages\Page;
use App\Models\Category;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ClosedOrders extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $modelLabel = 'Ordens';
    protected static ?string $pluralModelLabel = 'Ordens concluídas';
    protected static ?string $navigationLabel = 'Ordens concluídas';
    protected static ?string $title = 'Ordens concluídas';

    protected static string $view = 'filament.cliente.pages.closed-orders';

    public static function table(Table $table): Table
    {
        return $table
            ->query(Order::query()->where('status', 'Entregue ao Cliente')->where('client_id', auth()->user()->client_id))
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('N° OS')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('defect')
                    ->label('Defeito')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('details')
                    ->label('Serviços executados')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descbudget')
                    ->label('Desc. Orçamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('valuebudget')
                    ->label('Val. Orçamento'),
                Tables\Columns\TextColumn::make('valueservice')
                    ->label('Val. Serviço'),
                Tables\Columns\TextColumn::make('valueparts')
                    ->label('Val. Peças'),
                Tables\Columns\TextColumn::make('cost')
                    ->label('Custo Total'),
                Tables\Columns\TextColumn::make('dtdelivery')
                    ->label('Entrega')
                    ->since()
                    ->dateTime("d/m/Y H:i")
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Entregue ao Cliente' => 'danger',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make()
            ])
            ->bulkActions([
                //
            ]);
    }
}
