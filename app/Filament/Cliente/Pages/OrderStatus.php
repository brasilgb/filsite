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
use Filament\Tables\Table;
class OrderStatus extends Page
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $modelLabel = 'Categoria';
    protected static ?string $pluralModelLabel = 'Categorias';
    protected static ?string $navigationLabel = 'Categorias';


    protected static string $view = 'filament.cliente.pages.order-status';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Produto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand')
                    ->label('Fabricante')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Categorias'),
                Tables\Columns\ToggleColumn::make('active')
                    ->label('Ativo'),
                Tables\Columns\TextColumn::make('valnormal')
                    ->label('Valor')
                    ->prefix('R$')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('valpromo')
                    ->label('Promoção')
                    ->prefix('R$')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Cadastro')
                    ->dateTime("d/m/Y H:i")
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Produto deletado')
                            ->body('O produto foi deletado com sucesso.')
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
