<?php

namespace App\Filament\Resources\OrderItemsResource\Pages;

use App\Filament\Resources\OrderItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderItems extends ListRecords
{
    protected static string $resource = OrderItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
