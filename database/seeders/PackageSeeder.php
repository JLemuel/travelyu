<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $packages = [
            [
                'destination_id' => 1, // Assume a destination ID that exists in your destinations table
                'name' => 'Classic Tour Package',
                'type' => 'classic',
                'description' => 'Experience the timeless beauty of the city with our Classic Tour Package.',
                'price' => 199.99,
                'duration' => 7,
                'image' => json_encode([
                    "images/01HSST66B44ZNN52H741BZZ3GP.jpg",
                    "images/01HSST66B9D6RACRBF1QEAC14H.jpg",
                    "images/01HSST66BAHNYNBMY12SWC8RD8.jpg"
                ]),
                'start_date' => Carbon::now()->format('Y-m-d'),
                'end_date' => Carbon::now()->addDays(30)->format('Y-m-d'),
                'booking_limit' => 50,
                'max_persons' => 5,
                'tour_plan_details' => '<p><strong>Day 1: Arrival and Welcome</strong></p>
                    <ul>
                        <li>Morning: Arrival at the city/airport.</li>
                        <li>Afternoon: City tour.</li>
                        <li>Evening: Welcome dinner.</li>
                    </ul>'
            ],
            [
                'destination_id' => 1,
                'name' => 'Summer Adventure Package',
                'type' => 'summer',
                'description' => 'Get ready for fun in the sun with our Summer Adventure Package.',
                'price' => 299.99,
                'duration' => 10,
                'image' => json_encode([
                    "images/01HSST66B44ZNN52H741BZZ3GP.jpg",
                    "images/01HSST66B9D6RACRBF1QEAC14H.jpg",
                    "images/01HSST66BAHNYNBMY12SWC8RD8.jpg"
                ]),
                'start_date' => Carbon::now()->addMonths(1)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(2)->format('Y-m-d'),
                'booking_limit' => 30,
                'max_persons' => 4,
                'tour_plan_details' => '<p><strong>Day 1: Arrival and Welcome</strong></p>
                    <ul>
                        <li>Morning: Arrival at the city/airport.</li>
                        <li>Afternoon: City tour.</li>
                        <li>Evening: Welcome dinner.</li>
                    </ul>'
            ],
            [
                'destination_id' => 1,
                'name' => 'Rainy Day Special',
                'type' => 'rainy',
                'description' => 'Don\'t let the rain dampen your spirits! Enjoy our Rainy Day Special.',
                'price' => 99.99,
                'duration' => 5,
                'image' => json_encode([
                    "images/01HSST66B44ZNN52H741BZZ3GP.jpg",
                    "images/01HSST66B9D6RACRBF1QEAC14H.jpg",
                    "images/01HSST66BAHNYNBMY12SWC8RD8.jpg"
                ]),
                'start_date' => Carbon::now()->addMonths(3)->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths(4)->format('Y-m-d'),
                'booking_limit' => 20,
                'max_persons' => 6,
                'tour_plan_details' => '<p><strong>Day 1: Arrival and Welcome</strong></p>
                    <ul>
                        <li>Morning: Arrival at the city/airport.</li>
                        <li>Afternoon: City tour.</li>
                        <li>Evening: Welcome dinner.</li>
                    </ul>',
            ]
        ];

        DB::table('packages')->insert($packages);
    }
}
