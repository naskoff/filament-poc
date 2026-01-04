<?php

declare(strict_types=1);

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\PageResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('notification')
                ->label('Send Notification')
                ->icon('heroicon-o-bell')
                ->action(function () {
                    Notification::make()
                        ->title('Hello World!')
                        ->body('This is a test notification.')
                        ->broadcast(auth()->user())
                        ->send();
                })
        ];
    }
}
