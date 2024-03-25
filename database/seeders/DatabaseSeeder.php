<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin User', // Concatenating 'Admin' and 'User'
            'first_name' => 'Admin',
            'last_name' => 'User',
            'birthday' => '1980-01-01',
            'email' => 'admin@info.com',
            'contact_number' => '1234567890',
            'type' => 'admin',
            'username' => 'adminuser',
            'password' => Hash::make('password'),
        ]);

        // Tourist user
        User::factory()->create([
            'name' => 'Tourist User', // Concatenating 'Tourist' and 'User'
            'first_name' => 'Tourist',
            'last_name' => 'User',
            'birthday' => '1990-02-02',
            'email' => 'tourist@info.com',
            'contact_number' => '0987654321',
            'type' => 'tourist',
            'username' => 'touristuser',
            'password' => Hash::make('password'),
        ]);

        // Travel Agency user
        User::factory()->create([
            'name' => 'Travel Agency', // Concatenating 'Travel' and 'Agency'
            'first_name' => 'Travel',
            'last_name' => 'Agency',
            'birthday' => '1985-03-03',
            'email' => 'travelagency@info.com',
            'contact_number' => '1234509876',
            'type' => 'travel_agency',
            'username' => 'travelagencyuser',
            'password' => Hash::make('password'),
        ]);

        // Seed other tables
        Artisan::call('db:seed', ['--class' => 'DestinationSeeder']);
        Artisan::call('db:seed', ['--class' => 'ActivitySeeder']);
        Artisan::call('db:seed', ['--class' => 'PackageSeeder']);
    }
}
