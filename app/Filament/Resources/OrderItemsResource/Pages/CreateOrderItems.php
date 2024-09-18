<?php

namespace App\Filament\Resources\OrderItemsResource\Pages;

use App\Filament\Resources\OrderItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderItems extends CreateRecord
{
    protected static string $resource = OrderItemsResource::class;
}
