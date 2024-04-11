<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Columns;
use Filament\Forms\Components\Column;
use Filament\Forms\Components\Textarea;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

use Filament\Forms\Components\Grid;


class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        TextInput::make('agency_name')
                            ->label('Name of Agency')
                            ->required(),

                        DatePicker::make('establishment_date')
                            ->label('Date of Establishment')
                            ->required(),

                        TextInput::make('email')
                            ->email()
                            ->label('Email')
                            ->required(),

                        // ... More fields here


                        TextInput::make('tagline')
                            ->label('Tagline'),

                        FileUpload::make('file_path')
                            ->label('File')
                            ->required(),

                        FileUpload::make('profile_image')
                            ->label('Profile Picture'),
                    ])
                    ->columnSpan([
                        'default' => 1,
                        // 'sm' => 2,
                        // 'md' => 3,
                        // 'lg' => 4,
                        // 'xl' => 6,
                        // '2xl' => 8,
                    ]),
            ]);
    }
}
