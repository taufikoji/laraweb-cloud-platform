<?php

namespace App\Filament\Resources;

use App\Enums\LicenseStatus;
use App\Filament\Resources\LicenseResource\Pages;
use App\Models\License;
use App\Services\ActivityLogger;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LicenseResource extends Resource
{
    protected static ?string $model = License::class;
    protected static ?string $navigationIcon = 'heroicon-o-key';
    public static function form(Form $form): Form { return $form->schema([Forms\Components\Select::make('customer_id')->relationship('customer', 'institution_name')->required(), Forms\Components\Select::make('product_id')->relationship('product', 'name')->required(), Forms\Components\TextInput::make('license_key')->required()->unique(ignoreRecord: true), Forms\Components\TextInput::make('domain'), Forms\Components\TextInput::make('installation_id'), Forms\Components\TextInput::make('max_users')->numeric(), Forms\Components\DateTimePicker::make('starts_at'), Forms\Components\DateTimePicker::make('expires_at'), Forms\Components\Select::make('status')->options(LicenseStatus::class)->required(), Forms\Components\Textarea::make('notes')]); }
    public static function table(Table $table): Table { return $table->columns([Tables\Columns\TextColumn::make('license_key')->searchable(), Tables\Columns\TextColumn::make('customer.institution_name'), Tables\Columns\TextColumn::make('product.code'), Tables\Columns\TextColumn::make('status')->badge(), Tables\Columns\TextColumn::make('expires_at')->dateTime()])->actions([Tables\Actions\Action::make('suspend')->action(fn (License $record) => static::setStatus($record, LicenseStatus::Suspended)), Tables\Actions\Action::make('revoke')->requiresConfirmation()->action(fn (License $record) => static::setStatus($record, LicenseStatus::Revoked)), Tables\Actions\Action::make('extend')->form([Forms\Components\DateTimePicker::make('expires_at')->required()])->action(fn (License $record, array $data) => $record->update(['expires_at' => $data['expires_at']])), Tables\Actions\EditAction::make()]); }
    public static function setStatus(License $license, LicenseStatus $status): void { $license->update(['status' => $status]); app(ActivityLogger::class)->log('license.'. $status->value, 'License status changed.', $license); }
    public static function getPages(): array { return ['index' => Pages\ListLicenses::route('/'), 'create' => Pages\CreateLicense::route('/create'), 'edit' => Pages\EditLicense::route('/{record}/edit')]; }
}
