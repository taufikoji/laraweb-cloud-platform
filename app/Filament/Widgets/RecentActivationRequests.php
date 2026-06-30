<?php

namespace App\Filament\Widgets;

use App\Models\ActivationRequest;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentActivationRequests extends TableWidget
{
    protected static ?string $heading = 'Recent Activation Requests';
    public function table(Table $table): Table { return $table->query(ActivationRequest::query()->latest()->limit(5))->columns([Tables\Columns\TextColumn::make('institution_name'), Tables\Columns\TextColumn::make('domain'), Tables\Columns\TextColumn::make('status')->badge()]); }
}
