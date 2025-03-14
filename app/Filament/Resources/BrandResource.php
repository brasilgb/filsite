<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';
    protected static ?string $modelLabel = 'Fabricante';
    protected static ?string $pluralModelLabel = 'Fabricantes';
    protected static ?string $navigationLabel = 'Fabricantes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->label('Fabricante')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Logo fabricante')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Logotipo')
                    ->circular(),
                Tables\Columns\TextColumn::make('brand')
                    ->label('Fabricante')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Cadastro')
                    ->dateTime("d/m/Y H:i")
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Fabricante inserido')
                            ->body('O fabricante foi inserido com sucesso.')
                    ),
                Tables\Actions\EditAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Fabricante editado')
                            ->body('O fabricante foi editado com sucesso.')
                    ),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Fabricante deletado')
                            ->body('O fabricante foi deletado com sucesso.')
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBrands::route('/'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }
}
