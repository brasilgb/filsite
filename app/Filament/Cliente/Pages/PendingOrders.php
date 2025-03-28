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
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PendingOrders extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $modelLabel = 'Ordens';
    protected static ?string $pluralModelLabel = 'Ordens pendentes';
    protected static ?string $navigationLabel = 'Ordens pendentes';
    protected static ?string $title = 'Ordens pendentes';

    protected static string $view = 'filament.cliente.pages.pending-orders';

    public static function table(Table $table): Table
    {
        return $table
            ->query(Order::query()->where('status', '<>', 'Entregue ao Cliente')->where('client_id', auth()->user()->client_id))
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('N° OS')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('defect')
                    ->label('Defeito')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descbudget')
                    ->label('Desc. Orçamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('valuebudget')
                    ->label('Val. Orçamento'),
                Tables\Columns\TextColumn::make('dtentry')
                    ->label('Entrada')
                    ->dateTime("d/m/Y H:i")
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->columnSpan(['8' => 'oito'])
                    ->color(fn(string $state): string => match ($state) {
                        'Ordem Aberta' => 'gray',
                        'Ordem Fechada' => 'warning',
                        'Orçamento Gerado' => 'success',
                        'Orçamento Aprovado' => 'danger',
                        'ExecutandoReparo' => 'gray',
                        '(CA)Serviço Concluído' => 'warning',
                        '(CN)Serviço Concluído' => 'success',
                        'Entregue ao Cliente' => 'success',
                    }),
            ])
            ->modifyQueryUsing(function (Builder $query) {

                return $query->where('status', '<>', 8);
            })
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
