<?php

namespace App\Filament\Resources\CarouselSlideResource\Pages;

use App\Filament\Resources\CarouselSlideResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCarouselSlides extends ManageRecords
{
    protected static string $resource = CarouselSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
