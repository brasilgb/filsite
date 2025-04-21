<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
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
use Leandrocfe\FilamentPtbrFormFields\Currencies\BRL;
use Leandrocfe\FilamentPtbrFormFields\Money;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-device-phone-mobile';
    protected static ?string $modelLabel = 'Produto';
    protected static ?string $pluralModelLabel = 'Produtos';
    protected static ?string $navigationLabel = 'Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make()->schema([
                            Forms\Components\Select::make('categories')
                                ->label('Categorias')
                                ->rules(['required'])
                                ->multiple()
                                ->relationship('categories', 'name')
                                ->searchable(),
                            Forms\Components\TextInput::make('brand')
                                ->label('Fabricante')
                                ->maxLength(255)
                                ->rules(['required'])
                                ->default(null)
                        ])->columns(2),
                        Grid::make()->schema([
                            Forms\Components\TextInput::make('title')
                                ->label('Produto')
                                ->live(debounce: 250)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->rules(['required'])
                                ->maxLength(255),
                            Forms\Components\TextInput::make('slug')
                                ->rules(['required'])
                                ->maxLength(255)
                        ])->columns(2),

                        Forms\Components\Textarea::make('summary')
                            ->label('Breve descrição')
                            ->rules(['required'])
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('content')
                            ->label('Descrição completa')
                            ->rules(['required'])
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('featured')
                            ->disk('public')
                            ->directory('product')
                            ->visibility('public')
                            ->label('Imagem destacada')
                            ->image(),
                        Grid::make()->schema([
                            Forms\Components\Toggle::make('active')
                                ->label('Ativar produto'),
                            Forms\Components\Toggle::make('home')
                                ->label('Página inicial'),
                        ])->columns(2),
                        Forms\Components\TextInput::make('url')
                            ->label('URL Externa')
                            ->maxLength(255)
                            ->placeholder('http://meulink.com.br/')
                            ->default(null),
                        Grid::make()->schema([
                            Money::make('valnormal')
                                ->currency(BRL::class)
                                ->prefix('R$'),
                            Money::make('valpromo')
                                ->currency(BRL::class)
                                ->prefix('R$'),
                        ])->columns(2),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured')
                    ->label('Destaque'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }
}
