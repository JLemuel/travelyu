<?php

namespace App\Filament\Pages;

use App\Models\User; // Assuming the User model is in the App namespace

use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Concerns;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
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
        $user = auth()->user(); // Get the authenticated user

        return $form
            ->schema([
                Forms\Components\Section::make('Profile Information')
                    ->description('Update your account\'s profile information and email address.')
                    ->schema([
                        Forms\Components\FileUpload::make('profile_image')->label('Profile Picture')->avatar(),
                        Forms\Components\TextInput::make('name')->label('Name')->required(),
                        Forms\Components\TextInput::make('agency_name')->label('Name of Agency')->when(fn () => $user->type === 'travel_agency')->required(),
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
                Forms\Components\Section::make('Update Password')
                    ->description('Ensure your account is using a long, random password to stay secure.')
                    ->schema([
                        Forms\Components\TextInput::make('Current password')->password()->required()->currentPassword(),
                        Forms\Components\TextInput::make('password')->password()->required()->rule(Password::default())->autocomplete('new-password')->dehydrateStateUsing(fn ($state): string => Hash::make($state))->live(debounce: 500)->same('passwordConfirmation'),
                        Forms\Components\TextInput::make('passwordConfirmation')->password()->required()->dehydrated(false),
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

    protected function getUpdateProfileFormActions(): array
    {
        return [
            Action::make('updateProfileAction')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('editProfileForm'),
        ];
    }
    protected function getUpdatePasswordFormActions(): array
    {
        return [
            Action::make('updatePasswordAction')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('editPasswordForm'),
        ];
    }

    public function updateProfile(): void
    {
        $data = $this->editProfileForm->getState();
        $this->handleRecordUpdate($this->getUser(), $data);
        $this->sendSuccessNotification();
    }
    public function updatePassword(): void
    {
        $data = $this->editPasswordForm->getState();
        $this->handleRecordUpdate($this->getUser(), $data);
        if (request()->hasSession() && array_key_exists('password', $data)) {
            request()->session()->put(['password_hash_' . Filament::getAuthGuard() => $data['password']]);
        }
        $this->editPasswordForm->fill();
        $this->sendSuccessNotification();
    }
    private function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);
        return $record;
    }

    private function sendSuccessNotification(): void
    {
        Notification::make()
            ->success()
            ->title(__('filament-panels::pages/auth/edit-profile.notifications.saved.title'))
            ->send();
    }
}