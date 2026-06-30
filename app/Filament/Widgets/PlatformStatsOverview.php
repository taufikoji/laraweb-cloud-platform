<?php

namespace App\Filament\Widgets;

use App\Enums\ActivationRequestStatus;
use App\Enums\LicenseStatus;
use App\Models\ActivationRequest;
use App\Models\Customer;
use App\Models\License;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PlatformStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Customers', Customer::query()->count()),
            Stat::make('Active Licenses', License::query()->where('status', LicenseStatus::Active)->count()),
            Stat::make('Pending Activations', ActivationRequest::query()->where('status', ActivationRequestStatus::Pending)->count()),
            Stat::make('Expired Licenses', License::query()->where('status', LicenseStatus::Expired)->orWhere('expires_at', '<', now())->count()),
        ];
    }
}
