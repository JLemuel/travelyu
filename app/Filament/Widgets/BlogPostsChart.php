<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = null;

    protected int | string | array $columnSpan = 'full';

    protected static string $color = 'primary';

    protected static ?string $maxHeight = '200px';

    protected static ?int $sort = 2;

    public ?string $filter = '3months';

    public function getHeading(): string
    {
        $user = auth()->user();
        return $user->email === 'admin@info.com' ? 'No. of People Entering La Union' : 'No. of Tourists Who Book';
    }

    protected function getFilters(): ?array
    {
        return [
            'week' => 'Last Week',
            'month' => 'Last Month',
            '3months' => 'Last 3 Months',
        ];
    }

    protected function getData(): array
    {
        $filter = $this->filter;
        $user = auth()->user();

        if ($user->email === 'admin@info.com') {
            $chartType = 'bar';
            match ($filter) {
                'week' => $data = Trend::model(Booking::class)
                    ->between(
                        start: now()->subWeek(),
                        end: now(),
                    )
                    ->perDay()
                    ->sum('adults_count'),
                'month' => $data = Trend::model(Booking::class)
                    ->between(
                        start: now()->subMonth(),
                        end: now(),
                    )
                    ->perDay()
                    ->sum('adults_count'),
                '3months' => $data = Trend::model(Booking::class)
                    ->between(
                        start: now()->subMonths(3),
                        end: now(),
                    )
                    ->perMonth()
                    ->sum('adults_count'),
            };
        } else {
            $chartType = 'line';
            match ($filter) {
                'week' => $data = Trend::model(Booking::class)
                    ->between(
                        start: now()->subWeek(),
                        end: now(),
                    )
                    ->perDay()
                    ->count(),
                'month' => $data = Trend::model(Booking::class)
                    ->between(
                        start: now()->subMonth(),
                        end: now(),
                    )
                    ->perDay()
                    ->count(),
                '3months' => $data = Trend::model(Booking::class)
                    ->between(
                        start: now()->subMonths(3),
                        end: now(),
                    )
                    ->perMonth()
                    ->count(),
            };
        }

        return [
            'datasets' => [
                [
                    'label' => 'Data',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
