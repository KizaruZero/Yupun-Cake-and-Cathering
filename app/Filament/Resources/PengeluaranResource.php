<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengeluaranResource\Pages;
use App\Filament\Resources\PengeluaranResource\RelationManagers;
use App\Models\Pengeluaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengeluaranResource extends Resource
{
    protected static ?string $model = Pengeluaran::class;

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $label = 'Expenses';


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationName = 'Pengeluaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pengeluaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_pengeluaran')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_pengeluaran')
                    ->required(),
                Forms\Components\TextInput::make('keterangan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foto_bukti_pengeluaran')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pengeluaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_pengeluaran')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pengeluaran')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_bukti_pengeluaran')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPengeluarans::route('/'),
            'create' => Pages\CreatePengeluaran::route('/create'),
            'edit' => Pages\EditPengeluaran::route('/{record}/edit'),
        ];
    }
}
