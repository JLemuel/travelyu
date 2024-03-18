<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destination::create([
            'name' => 'Mountain Resort',
            'description' => 'Escape to the serene mountains and enjoy outdoor adventures.',
            'image' => ['url' => 'mountain_resort.jpg', 'caption' => 'Mountain Resort'],
        ]);

        Destination::create([
            'name' => 'Beach Paradise',
            'description' => 'Relax on pristine beaches and soak up the sun.',
            'image' => ['url' => 'beach_paradise.jpg', 'caption' => 'Beach Paradise'],
        ]);

        // Add more destinations as needed
    }
}
