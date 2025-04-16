<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use Rawilk\FilamentPasswordInput\Password;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = "Configurações";
    protected static ?string $modelLabel = 'Usuário';
    protected static ?string $pluralModelLabel = 'Usuários';
    protected static ?string $navigationLabel = 'Usuários';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nome')
                        ->rules(['required'])
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label('E-mail')
                        ->rules(['required']),
                ])->columns(2),
                Password::make('password')
                    ->label('Senha')
                    ->password()
                    ->confirmed()
                    ->rules(['min:8'])
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create'),
                Password::make('password_confirmation')
                    ->label('Repita a senha')
                    ->password()
                    ->required(fn(string $context): bool => $context === 'create')
                    ->dehydrated(false)
                    ->rules(['min:8']),
                // ,
                Forms\Components\Toggle::make('is_admin')
                    ->label('Administrador'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Ativar usuário'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Ativo'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Cadastro')
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
                            ->title('Usuário deletado')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }
}
