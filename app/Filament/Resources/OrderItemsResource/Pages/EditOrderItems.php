<?php

namespace App\Filament\Resources\OrderItemsResource\Pages;

use App\Filament\Resources\OrderItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderItems extends EditRecord
{
    protected static string $resource = OrderItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
