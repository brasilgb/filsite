<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
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

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $modelLabel = 'Categoria';
    protected static ?string $pluralModelLabel = 'Categorias';
    protected static ?string $navigationLabel = 'Categorias';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make()->schema([
                            Forms\Components\Select::make('category_id')
                                ->label('Categoria Pai')
                                ->options(Category::all()->pluck('name', 'id')),
                            Forms\Components\Select::make('type')
                                ->options([
                                    'product' => 'Produtos',
                                    'service' => 'Serviços'
                                ])
                                ->label('Tipo')
                                ->rules(['required']),
                            Forms\Components\TextInput::make('name')
                                ->label('Categoria')
                                ->live()
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->rules(['required']),
                            Forms\Components\TextInput::make('slug')
                                ->rules(['required']),
                        ])->columns(4),

                        Forms\Components\RichEditor::make('description')
                            ->label('Descrição')
                            ->columnSpanFull(),
                        Grid::make()->schema([
                            Forms\Components\FileUpload::make('thumbnail')
                                ->image(),
                            Forms\Components\FileUpload::make('featured')
                                ->label('Imagem Destacada')
                                ->image()
                        ])->columns(2),
                        Grid::make()->schema([
                            Forms\Components\Toggle::make('active')
                                ->rules(['required']),
                            Forms\Components\Toggle::make('visiblehome')
                                ->label('Página Inicial')
                                ->rules(['required']),
                        ])->columns(2),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Miniatura')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Categoria')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Cat.Pai'),
                Tables\Columns\ToggleColumn::make('active')
                    ->label('Ativa'),
                Tables\Columns\ToggleColumn::make('menu')
                    ->label('Menu'),
                Tables\Columns\ToggleColumn::make('visiblehome')
                    ->label('Home'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criação')
                    ->dateTime("d/m/Y H:i")
                    ->sortable(),
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
                            ->title('Categoria deletada')
                            ->body('A categoria foi deletada com sucesso.')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }
}
