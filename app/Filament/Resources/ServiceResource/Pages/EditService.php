<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
        
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Serviço editado')
            ->body('O serviço foi editado com sucesso.');
    }
}
