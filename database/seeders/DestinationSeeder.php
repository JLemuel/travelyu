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
            'image' => json_encode([
                "images/01HSST66B44ZNN52H741BZZ3GP.jpg",
                "images/01HSST66B9D6RACRBF1QEAC14H.jpg",
                "images/01HSST66BAHNYNBMY12SWC8RD8.jpg"
            ]),
        ]);

        Destination::create([
            'name' => 'Beach Paradise',
            'description' => 'Relax on pristine beaches and soak up the sun.',
            'image' => json_encode([
                "images/01HSST66B44ZNN52H741BZZ3GP.jpg",
                "images/01HSST66B9D6RACRBF1QEAC14H.jpg",
                "images/01HSST66BAHNYNBMY12SWC8RD8.jpg"
            ]),
        ]);

        // Add more destinations as needed
    }
}
