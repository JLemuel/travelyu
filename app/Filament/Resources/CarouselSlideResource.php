<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselSlideResource\Pages;
use App\Filament\Resources\CarouselSlideResource\RelationManagers;
use App\Models\CarouselSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarouselSlideResource extends Resource
{
    protected static ?string $model = CarouselSlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';

    protected static ?string $navigationGroup = 'User Management';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'warning' : 'success';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('carousel_image')
                    ->label('Carousel Image')
                    ->required()
                    ->disk('public') // Make sure you have a 'public' disk configured in config/filesystems.php
                    ->directory('carousel_images'), // The directory within the disk to store images
                Forms\Components\Toggle::make('is_active')
                    ->label('Active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\ImageColumn::make('carousel_image')
                    ->disk('public')
                    ->circular() // Ensure to set the same disk as in the form
                    ->label('Image'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCarouselSlides::route('/'),
        ];
    }
}
