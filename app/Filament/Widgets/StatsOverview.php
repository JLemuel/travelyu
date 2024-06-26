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
        return 2;
    }

    // protected function getStats(): array
    // {
    //     return [
    //         Stat::make('Bookings Count', Booking::count())
    //             ->description('Total Bookings')
    //             ->descriptionIcon('heroicon-m-arrow-trending-up')
    //             ->color('success'),
    //         Stat::make('Destination Count', Destination::count())
    //             ->description('Total Destinations')
    //             ->descriptionIcon('heroicon-m-arrow-trending-up')
    //             ->color('danger'),
    //         Stat::make('Packages Count', Package::count())
    //             ->description('Total Packages')
    //             ->descriptionIcon('heroicon-m-arrow-trending-up')
    //             ->color('success'),
    //         Stat::make('Activity Count', Activity::count())
    //             ->description('Total Activity')
    //             ->descriptionIcon('heroicon-m-arrow-trending-up')
    //             ->color('success'),
    //     ];
    // }

    protected function getStats(): array
    {
        $user = auth()->user(); // Get the currently authenticated user

        $stats = [];


        if ($user->email === 'admin@info.com') {
            $stats[] = Stat::make('Destination Count', Destination::count())
                ->description('Total Destinations')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('danger');

            $stats[] = Stat::make('Activity Count', Activity::count())
                ->description('Total Activity')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success');
        } else {
            $stats[] =  Stat::make('Bookings Count', Booking::count())
                ->description('Total Bookings')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success');

            $stats[] = Stat::make('Packages Count', Package::count())
                ->description('Total Packages')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success');
        }

        return $stats;
    }
}
