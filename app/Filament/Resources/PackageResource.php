<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Activity;
use App\Models\Destination;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Forms\Components\Section;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?int $navigationSort = 3;

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
                // Destination Selection
                Forms\Components\Select::make('destination_id')
                    ->label('Choose a Destination')
                    ->options(Destination::pluck('name', 'id'))
                    ->required()
                    ->reactive(),

                // Core Tour Details
                Forms\Components\TextInput::make('name')
                    ->label('Tour Name') // More descriptive label
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->label('Tour Type')
                    ->options(['Classic', 'Rainy', 'Summer'])
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

                // Pricing & Capacity
                Section::make('Pricing & Capacity')
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('₱'),
                        Forms\Components\TextInput::make('duration')
                            ->label('Duration (Days)')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('booking_limit')
                            ->label('Booking Limit')
                            ->numeric(),
                        Forms\Components\TextInput::make('max_persons')
                            ->label('Max Participants')
                            ->numeric(),
                    ])->columns(2),

                Section::make('Tour Plan Details')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        RichEditor::make('tour_plan_details')
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                    ]),
                // Scheduling
                Section::make('Scheduling')
                    ->schema([
                        Forms\Components\DatePicker::make('start_date')
                            ->required(),
                        Forms\Components\DatePicker::make('end_date')
                            ->required(),
                    ])->columns(2),


                // Images
                Section::make('Images')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->multiple()
                            ->image()
                            ->disk('public')
                            ->directory('images')
                            ->required()
                            ->previewable(true)
                            ->columnSpanFull(), // Occupy full width
                    ])->columns(2),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('destination.name')
                    ->label('Destination')
                    ->searchable(),  // Assuming 'destination' relationship exists
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('php') // Adjust currency if needed
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration (Days)')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->circular(), // No stacking needed for a single image
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking_limit'),
                Tables\Columns\TextColumn::make('max_persons'),
                // ... (created_at, updated_at - Keep if desired)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
