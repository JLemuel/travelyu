<?php

namespace App\Filament\Pages;

use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Concerns;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Auth\Authenticatable;
use Filament\Forms\Concerns\InteractsWithForms;

class EditProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.pages.edit-profile';
    protected static bool $shouldRegisterNavigation = false;

    public ?array $profileData = [];
    public ?array $passwordData = [];

    public function mount(): void
    {
        $this->fillForms();
    }

    protected function getForms(): array
    {
        return [
            'editProfileForm',
            'editPasswordForm',
        ];
    }

    public function editProfileForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profile Information')
                    ->description('Update your account\'s profile information and email address.')
                    ->schema([
                        Forms\Components\FileUpload::make('profile_image')->label('Profile Picture')->avatar(),
                        Forms\Components\TextInput::make('name')->label('Name')->required(),
                        Forms\Components\TextInput::make('agency_name')->label('Name of Agency')->required(),
                        Forms\Components\DatePicker::make('establishment_date')->label('Date of Establishment')->required(),
                        Forms\Components\TextInput::make('email')->label('Email')->email()->required()->unique(ignoreRecord: true),
                        // Add more fields here as needed
                        Forms\Components\TextInput::make('tagline')->label('Tagline'),
                        Forms\Components\FileUpload::make('file_path')->label('File')->required(),
                    ])->columns(2),
            ])
            ->model($this->getUser())
            ->statePath('profileData');
    }

    public function editPasswordForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profile Information')
                    ->description("Update your account's profile information and email address.")
                    ->schema([
                        Forms\Components\Grid::make(2) // Specifies a two-column layout
                            ->schema([
                                Forms\Components\FileUpload::make('profile_image')
                                    ->label('Profile Picture')
                                    ->avatar()
                                    ->columnSpanFull()
                                    ->disk('public')
                                    ->directory('profile-pictures'), // Assume 'centered' is a custom method or existing method to apply centering styles

                                Forms\Components\TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->columnSpan(1), // Specifies that this field should take up one column

                                Forms\Components\TextInput::make('agency_name')
                                    ->label('Name of Agency')
                                    ->required()
                                    ->columnSpan(1), // Specifies that this field should take up one column

                                Forms\Components\DatePicker::make('establishment_date')
                                    ->label('Date of Establishment')
                                    ->required()
                                    ->columnSpan(1), // Specifies that this field should take up one column

                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->columnSpan(1), // Specifies that this field should take up one column

                                Forms\Components\TextInput::make('tagline')
                                    ->label('Tagline')
                                    ->columnSpan(1), // Specifies that this field should take up one column

                                Forms\Components\FileUpload::make('file_path')
                                    ->label('File')
                                    ->required()
                                    ->columnSpan(1), // Specifies that this field should take up one column
                            ])
                    ]),

            ])
            ->model($this->getUser())
            ->statePath('passwordData');
    }

    protected function getUser(): Authenticatable & Model
    {
        $user = Filament::auth()->user();
        if (!$user instanceof Model) {
            throw new Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
        }
        return $user;
    }

    protected function fillForms(): void
    {
        $data = $this->getUser()->attributesToArray();
        $this->editProfileForm->fill($data);
        $this->editPasswordForm->fill();
    }
}
