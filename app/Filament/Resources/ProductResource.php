<?php

namespace App\Filament\Resources;

use App\Enums\ProductStatus;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    public static function form(Form $form): Form { return $form->schema([Forms\Components\TextInput::make('name')->required(), Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true), Forms\Components\TextInput::make('code')->required()->unique(ignoreRecord: true), Forms\Components\TextInput::make('current_version'), Forms\Components\Select::make('status')->options(ProductStatus::class)->required(), Forms\Components\Textarea::make('description')]); }
    public static function table(Table $table): Table { return $table->columns([Tables\Columns\TextColumn::make('name')->searchable()->sortable(), Tables\Columns\TextColumn::make('code'), Tables\Columns\TextColumn::make('current_version'), Tables\Columns\TextColumn::make('status')->badge()])->actions([Tables\Actions\EditAction::make()]); }
    public static function getPages(): array { return ['index' => Pages\ListProducts::route('/'), 'create' => Pages\CreateProduct::route('/create'), 'edit' => Pages\EditProduct::route('/{record}/edit')]; }
}
