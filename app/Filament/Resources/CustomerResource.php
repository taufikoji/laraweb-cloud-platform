<?php

namespace App\Filament\Resources;

use App\Enums\CustomerStatus;
use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('institution_name')->required()->maxLength(255),
            Forms\Components\TextInput::make('contact_name')->maxLength(255),
            Forms\Components\TextInput::make('email')->email()->maxLength(255),
            Forms\Components\TextInput::make('phone')->maxLength(255),
            Forms\Components\TextInput::make('domain')->maxLength(255),
            Forms\Components\Select::make('status')->options(CustomerStatus::class)->required(),
            Forms\Components\Textarea::make('address'),
            Forms\Components\Textarea::make('notes'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([Tables\Columns\TextColumn::make('institution_name')->searchable()->sortable(), Tables\Columns\TextColumn::make('email')->searchable(), Tables\Columns\TextColumn::make('domain'), Tables\Columns\TextColumn::make('status')->badge()])->actions([Tables\Actions\EditAction::make()])->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListCustomers::route('/'), 'create' => Pages\CreateCustomer::route('/create'), 'edit' => Pages\EditCustomer::route('/{record}/edit')];
    }
}
