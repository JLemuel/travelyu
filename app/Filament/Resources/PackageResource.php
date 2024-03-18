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

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

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
                Forms\Components\Select::make('destination_id')
                    ->label('Choose a Destination')
                    ->options(Destination::pluck('name', 'id'))
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('activities_id')
                    ->label('Choose a Activities')
                    ->multiple()
                    ->options(Activity::pluck('name', 'id'))
                    ->required()
                    ->reactive(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric(),
                // Forms\Components\TextInput::make('location')
                //     ->required()
                //     ->maxLength(255),

                Section::make('Images')->schema(([
                    Forms\Components\FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        // ->imageEditor()
                        ->multiple()
                        // ->preserveFilenames()
                        ->disk('public')
                        ->directory('images')
                        ->required()
                        ->previewable(true)
                        // ->resize(50)
                        ->columnSpan(2),
                ])),
                Section::make('Location')->schema(([
                    Forms\Components\TextInput::make('lat')
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $set('location', [
                                'lat' => floatVal($state),
                                'lng' => floatVal($get('lng')),
                            ]);
                        })
                        ->readonly()
                        ->lazy()
                        ->maxLength(32),
                    Forms\Components\TextInput::make('lng')
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $set('location', [
                                'lat' => floatval($get('lat')),
                                'lng' => floatVal($state),
                            ]);
                        })
                        ->readonly()
                        ->lazy()
                        ->maxLength(32),
                    // Forms\Components\TextInput::make('full_address')
                    //     ->reactive(),
                    Geocomplete::make('full_address')
                        ->countries(['us', 'mx', 'ca']) // restrict autocomplete results to these countries
                        ->prefix('Choose:')
                        ->placeholder('Start typing an address ...')
                        ->geocodeOnLoad()
                        ->geolocate(), // add a suffix but

                    Map::make('location')
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('lat', $state['lat']);
                            $set('lng', $state['lng']);
                        })
                        ->drawingControl()
                        ->defaultLocation([16.6159, 120.3209])
                        ->mapControls([
                            'zoomControl' => true,
                        ])
                        ->debug()
                        ->draggable() // allow dragging to move marker
                        ->clickable(false) // allow clicking to move marker

                        ->autocomplete('full_address')
                        ->autocompleteReverse()
                        // ->reverseGeocode([
                        //     'city'   => '%L',
                        //     'zip'    => '%z',
                        //     'state'  => '%A1',
                        //     'street' => '%n %S',
                        // ])
                        ->geolocate()
                        //                    ->reverseGeocodeUsing(function (callable $set, array $results) {
                        //                        $set('city', 'foo bar');
                        //                    })
                        //                    ->placeUpdatedUsing(function (callable $set, array $place) {
                        //                        $set('city', 'foo wibble');
                        //                    })
                        ->columnSpan(2), // allow clicking to move marker
                    // ->geolocate() // adds a button to request device location and set map marker accordingly
                    // ->geolocateLabel('Get Location') // overrides the default label for geolocate button
                    // ->geolocateOnLoad(true, false), // geolocate on load, second arg 'always' (default false, only for new form))
                ]))->columns(2)
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
