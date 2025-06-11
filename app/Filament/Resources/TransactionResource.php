<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Boarding House Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                ->required(),

                Select::make('boarding_house_id')
                    ->relationship('boardingHouse', 'name')
                    ->required(),

                Select::make('room_id')
                    ->relationship('room', 'name')
                    ->required(),

                TextInput::make('name')
                ->required(),

                TextInput::make('email')
                ->email()
                ->required(),

                TextInput::make('phone')
                ->required(),

                Select::make('payment_method')
                    ->options([
                        'down_payment' => 'Down payment',
                        'full_payment' => 'Full payment',
                    ])
                    ->required(),
                Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                    ])
                    ->required(),

                DatePicker::make('start_date')
                ->required(),

                TextInput::make('duration')
                ->numeric()
                ->required(),
                
                TextInput::make('total_amount')
                ->numeric()
                ->prefix('IDR')
                ->required(),

                DatePicker::make('transaction_date'
                )->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code'),
                TextColumn::make('boardingHouse.name'),
                TextColumn::make('room.name'),
                TextColumn::make('name'), 
                TextColumn::make('payment_method'),
                TextColumn::make('payment_status'),
                TextColumn::make('total_amount')->money('IDR'),
                TextColumn::make('transaction_date')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
