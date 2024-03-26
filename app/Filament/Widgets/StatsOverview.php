<?php

namespace App\Filament\Widgets;

use App\Models\Activity;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\Package;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Bookings Count', Booking::count())
                ->description('Total Bookings')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Destination Count', Destination::count())
                ->description('Total Destinatinations')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Packages Count', Package::count())
                ->description('Total Packages')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Activity Count', Activity::count())
                ->description('Total Activity')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
