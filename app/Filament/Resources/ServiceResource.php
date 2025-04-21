<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $modelLabel = 'Serviço';
    protected static ?string $pluralModelLabel = 'Serviços';
    protected static ?string $navigationLabel = 'Serviços';

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
                            Forms\Components\TextInput::make('title')
                                ->label('Serviço')
                                ->live(debounce: 250)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->rules(['required'])
                                ->maxLength(255),
                            Forms\Components\TextInput::make('slug')
                                ->rules(['required'])
                                ->maxLength(255)
                        ])->columns(3),

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
                            ->directory('service')
                            ->visibility('public')
                            ->label('Imagem destacada')
                            ->image(),
                        Forms\Components\Toggle::make('active')
                            ->label('Ativar serviço'),
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
                    ->label('Serviço'),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Categorias'),
                Tables\Columns\ToggleColumn::make('active')
                    ->label('Ativo'),
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
                            ->title('Serviço deletado')
                            ->body('O serviço foi deletado com sucesso.')
                    ),
                Tables\Actions\DetachAction::make()
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }
}
