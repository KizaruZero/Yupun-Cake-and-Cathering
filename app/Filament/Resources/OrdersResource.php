<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdersResource\Pages;
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



class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable(),
                BadgeColumn::make('status')->state(function (Orders $record): string {
                    return match ($record->status) { 'pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected', default => $record->status,
                    };
                })->colors([
                            'primary' => 'Pending',
                            'success' => 'Approved',
                            'danger' => 'Rejected',
                        ]),
                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_date')
                    ->dateTime()
                    ->sortable(),
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
                Action::make('approve')
                    ->label('Approve')
                    ->visible(fn(Orders $record) => $record->status === 'pending')
                    ->action(function (Orders $record) {
                        $record->update([
                            'status' => 'approved',
                            'approved_at' => now(),
                        ]);

                        return response()->json(['message' => 'Order approved and receipt sent to the user!']);
                    }),


                Action::make('reject')
                    ->label('Reject')
                    ->visible(fn(Orders $record) => $record->status === 'pending')
                    ->action(fn(Orders $record) => $record->update(['status' => 'rejected'])),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }
}
