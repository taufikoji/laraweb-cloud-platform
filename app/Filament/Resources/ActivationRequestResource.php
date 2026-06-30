<?php

namespace App\Filament\Resources;

use App\Enums\ActivationRequestStatus;
use App\Filament\Resources\ActivationRequestResource\Pages;
use App\Models\ActivationRequest;
use App\Services\LicenseApprovalService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActivationRequestResource extends Resource
{
    protected static ?string $model = ActivationRequest::class;
    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    public static function form(Form $form): Form { return $form->schema([Forms\Components\Select::make('product_id')->relationship('product', 'name'), Forms\Components\Select::make('customer_id')->relationship('customer', 'institution_name'), Forms\Components\TextInput::make('institution_name')->required(), Forms\Components\TextInput::make('contact_name'), Forms\Components\TextInput::make('email')->email(), Forms\Components\TextInput::make('domain')->required(), Forms\Components\TextInput::make('installation_id')->required(), Forms\Components\TextInput::make('server_ip'), Forms\Components\TextInput::make('app_version'), Forms\Components\Select::make('status')->options(ActivationRequestStatus::class)->required(), Forms\Components\Textarea::make('message')]); }
    public static function table(Table $table): Table { return $table->columns([Tables\Columns\TextColumn::make('institution_name')->searchable(), Tables\Columns\TextColumn::make('domain'), Tables\Columns\TextColumn::make('product.code'), Tables\Columns\TextColumn::make('status')->badge(), Tables\Columns\TextColumn::make('created_at')->dateTime()])->actions([Tables\Actions\Action::make('approve')->requiresConfirmation()->action(fn (ActivationRequest $record) => app(LicenseApprovalService::class)->approve($record)), Tables\Actions\Action::make('reject')->requiresConfirmation()->action(fn (ActivationRequest $record) => app(LicenseApprovalService::class)->reject($record)), Tables\Actions\EditAction::make()]); }
    public static function getPages(): array { return ['index' => Pages\ListActivationRequests::route('/'), 'create' => Pages\CreateActivationRequest::route('/create'), 'edit' => Pages\EditActivationRequest::route('/{record}/edit')]; }
}
