<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdersResource\Pages;
use App\Filament\Resources\OrdersResource\Pages\ViewOrder;
use App\Filament\Resources\OrdersResource\RelationManagers;
use App\Models\Orders;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;




class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;
    protected static ?string $navigationGroup = 'Shop';


    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Order Information')
                    ->schema([
                        Forms\Components\TextInput::make('user_name')
                            ->label('Customer Name')
                            ->readOnly()
                            ->formatStateUsing(fn ($record) => $record->user->name),
                        Forms\Components\TextInput::make('payment_method')
                            ->readOnly(),
                        Forms\Components\TextInput::make('status')
                            ->readOnly(),
                        Forms\Components\DatePicker::make('order_date')
                            ->readOnly(),
                        Forms\Components\DatePicker::make('requested_delivery_date')
                            ->readOnly(),
                        Forms\Components\DatePicker::make('delivery_date')
                            ->readOnly(),
                        
                        Forms\Components\TextInput::make('total_price')
                            ->readOnly()
                            ->prefix('Rp'),
                            
                        Forms\Components\FileUpload::make('payment_proof')
                            ->image()
                            ->imagePreviewHeight('250')
                            
                            ->columnSpanFull(),
                            
                        Forms\Components\Textarea::make('custom_order')
                            ->readOnly()
                            ->columnSpanFull()
                            ->formatStateUsing(fn ($record) => $record->custom_order),
                    ])->columns(2),
                    
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(fn (Orders $record): string => self::getUrl('view', ['record' => $record]))
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable(),
                BadgeColumn::make('status')
                    ->formatStateUsing(fn(string $state): string => ucfirst($state))
                    ->colors([
                        'secondary' => static fn($state): bool => $state === 'new',
                        'primary' => static fn($state): bool => $state === 'processing',
                        'success' => static fn($state): bool => $state === 'ready' || $state === 'completed',
                        'danger' => static fn($state): bool => $state === 'cancelled',
                    ])
                    ->icons([
                        'heroicon-o-check' => 'new',
                        'heroicon-o-clock' => 'processing',
                        'heroicon-o-truck' => 'ready',
                        'heroicon-o-check-circle' => 'completed',
                        'heroicon-o-x-circle' => 'cancelled',
                    ])
                    ->iconPosition('before')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('requested_delivery_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('payment_proof'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])

            ->actions([
                ActionGroup::make([
                    Action::make('approve')
                        ->label('Approve')
                        ->icon('heroicon-o-check')
                        ->visible(fn(Orders $record) => $record->status === 'new')
                        ->action(function (Orders $record) {
                            $record->update(attributes: [
                                'status' => 'processing',
                                'approved_at' => now(),
                            ]);
                            return response()->json(['message' => 'Order approved and Processing']);
                        }),
                    Action::make('cancel')
                        ->label('Cancel')
                        ->icon('heroicon-o-x-circle')
                        ->visible(fn(Orders $record) => $record->status === 'new')
                        ->action(fn(Orders $record) => $record->update(['status' => 'cancelled']))
                        ->requiresConfirmation(),
                    Action::make('ready')
                        ->label('Ready')
                        ->icon('heroicon-o-truck')
                        ->visible(fn(Orders $record) => $record->status === 'processing')
                        ->action(fn(Orders $record) => $record->update(['status' => 'ready', 'delivery_date' => now()])),
                    Action::make('complete')
                        ->label('Complete')
                        ->icon('heroicon-o-check')
                        ->visible(fn(Orders $record) => $record->status === 'ready')
                        ->action(fn(Orders $record) => $record->update(
                            ['status' => 'completed'],
                        )),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()
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
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }
}
