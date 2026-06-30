<?php

namespace App\Filament\Widgets;

use App\Models\ActivityLog;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentActivityLogs extends TableWidget
{
    protected static ?string $heading = 'Recent Activity Logs';
    public function table(Table $table): Table { return $table->query(ActivityLog::query()->latest()->limit(5))->columns([Tables\Columns\TextColumn::make('action'), Tables\Columns\TextColumn::make('description')->limit(40), Tables\Columns\TextColumn::make('created_at')->dateTime()]); }
}
