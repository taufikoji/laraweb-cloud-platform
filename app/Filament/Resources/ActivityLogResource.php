<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use App\Models\ActivityLog;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    public static function table(Table $table): Table { return $table->columns([Tables\Columns\TextColumn::make('action')->searchable(), Tables\Columns\TextColumn::make('description')->limit(50), Tables\Columns\TextColumn::make('ip_address'), Tables\Columns\TextColumn::make('created_at')->dateTime()])->defaultSort('created_at', 'desc'); }
    public static function getPages(): array { return ['index' => Pages\ListActivityLogs::route('/')]; }
}
