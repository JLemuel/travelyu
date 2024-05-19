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
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

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
                Hidden::make('travel_agency_id')
                    ->default(Auth::id())
                    ->visible(fn (): bool => Auth::user()->type === 'travel_agency'),


                // Destination Selection
                Forms\Components\CheckboxList::make('destinations')
                    ->label('Choose Destinations')
                    ->options(Destination::pluck('name', 'id'))
                    ->relationship('destinations', 'name')
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        if (!empty($state)) {
                            // $destinations = Destination::whereIn('id', $state)->get();
                            // $totalPrice = $destinations->sum('price');
                            // $set('price', $totalPrice);
                            $set('price', 0);
                        } else {
                            $set('price', 0);
                        }
                    })
                    ->required()
                    ->columnSpanFull()
                    ->columns(6)
                    ->gridDirection('row'),


                // Core Tour Details
                Forms\Components\TextInput::make('name')
                    ->label('Tour Name') // More descriptive label
                    ->required()
                    ->maxLength(255),
                // Forms\Components\Select::make('type')
                //     ->label('Tour Type')
                //     ->options(['Classic', 'Rainy', 'Summer'])
                //     ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

                // Pricing & Capacity
                Section::make('Pricing & Capacity')
                    ->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('₱')
                            ->default(0),
                        // Optional: disable editing if you want it purely dynamic,  // Prevents the field from sending its initial state back to the server
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

                // Pricing & Capacity
                Section::make('Additional Fees')
                    ->schema([
                        Forms\Components\TextInput::make('addtional_adult_price')
                            ->label('Adult additional fee')
                            ->prefix('₱')
                            ->numeric(),
                        // Forms\Components\TextInput::make('addtional_youth_price')
                        //     ->label('Youth additional fee')
                        //     ->numeric(),
                        Forms\Components\TextInput::make('addtional_children_price')
                            ->label('Children additional fee')
                            ->prefix('₱')
                            ->numeric(),
                    ])->columns(2),

                // Payment Details
                // Section::make('Payment Details')
                //     ->description('Provide payment methods available for this package.')
                //     ->schema([
                //         Forms\Components\TextInput::make('gcash_number')
                //             ->label('GCash Number')
                //             ->numeric()
                //             ->helperText('Enter the GCash number customers can send payments to.'),
                //         Forms\Components\TextInput::make('bank_account_number')
                //             ->label('Bank Account Number')
                //             ->helperText('Enter the bank account number for direct transfers.'),
                //     ])->columns(2),

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
                Tables\Columns\TextColumn::make('destinations.city')
                    ->label('Destinations')
                    // ->formatStateUsing(function ($state, $record) {
                    //     return $record->destinations->pluck('name')->join(', ');
                    // })
                    ->searchable(),
                Tables\Columns\TextColumn::make('destinations.name')
                    ->label('Type')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->destinations->pluck('name')->join(', ');
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('php') // Adjust currency if needed
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration (Days)')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image')
                    ->stacked()
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
