<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'name' => 'Hiking',
            'description' => 'Explore nature trails and enjoy breathtaking views.',
            'price' => 50.00,
            'image' => ['url' => 'hiking.jpg', 'caption' => 'Hiking Adventure'],
        ]);

        Activity::create([
            'name' => 'Scuba Diving',
            'description' => 'Discover the underwater world and swim with marine life.',
            'price' => 100.00,
            'image' => ['url' => 'scuba_diving.jpg', 'caption' => 'Scuba Diving Experience'],
        ]);

        // Add more activities as needed
    }
}
