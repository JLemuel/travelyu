<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Destination; // Import the Destination model
class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming you want to attach all activities to the first destination for simplicity
        $destinationId = Destination::where('name', 'Mountain Resort')->first()->id;

        Activity::create([
            'name' => 'Hiking',
            'description' => 'Explore nature trails and enjoy breathtaking views.',
            'price' => 50.00,
            'image' => json_encode(["images\/01HSSPVEPEN1YXN9TTFR8MB3H4.jpg", "images\/01HSSPVEPZ9MZDG1VJ7SDJS98C.jpg", "images\/01HSSPVEQ1VXC0HX7CCS2ARJG7.jpg"]),
            'destination_id' => $destinationId,
        ]);

        // You can continue assigning the same destination ID or fetch different ones if needed
        Activity::create([
            'name' => 'Scuba Diving',
            'description' => 'Discover the underwater world and swim with marine life.',
            'price' => 100.00,
           'image' => json_encode(["images\/01HSSPVEPEN1YXN9TTFR8MB3H4.jpg", "images\/01HSSPVEPZ9MZDG1VJ7SDJS98C.jpg", "images\/01HSSPVEQ1VXC0HX7CCS2ARJG7.jpg"]),
            'destination_id' => $destinationId,
        ]);
    }
}