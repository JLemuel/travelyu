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
            'image' => json_encode(["images\/01HSSPVEPEN1YXN9TTFR8MB3H4.jpg", "images\/01HSSPVEPZ9MZDG1VJ7SDJS98C.jpg", "images\/01HSSPVEQ1VXC0HX7CCS2ARJG7.jpg"]),
        ]);

        Destination::create([
            'name' => 'Beach Paradise',
            'description' => 'Relax on pristine beaches and soak up the sun.',
            'image' => json_encode(["images\/01HSSPVEPEN1YXN9TTFR8MB3H4.jpg", "images\/01HSSPVEPZ9MZDG1VJ7SDJS98C.jpg", "images\/01HSSPVEQ1VXC0HX7CCS2ARJG7.jpg"]),
        ]);

        // Add more destinations as needed
    }
}