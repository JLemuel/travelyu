<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\Destination;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@info.com',
        ]);
        User::factory()->create([
            'name' => 'Travel Agency',
            'email' => 'travelagency@info.com',
        ]);

        // Seed activities
        Artisan::call('db:seed', ['--class' => 'DestinationSeeder']);
        Artisan::call('db:seed', ['--class' => 'ActivitySeeder']);
        Artisan::call('db:seed', ['--class' => 'PackageSeeder']);
    }
}
