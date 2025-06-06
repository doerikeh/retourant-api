<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            ['name' => 'Kushi Tsuru', 'schedule' => json_encode(['Mon-Sun' => '11:30 am - 9 pm'])],
            ['name' => 'Osakaya Restaurant', 'schedule' => json_encode(['Mon-Thu, Sun' => '11:30 am - 9 pm', 'Fri-Sat' => '11:30 am - 9:30 pm'])],
            // Add other restaurants from the provided data
            ['name' => 'The Stinking Rose', 'schedule' => json_encode(['Mon-Thu, Sun' => '11:30 am - 10 pm', 'Fri-Sat' => '11:30 am - 11 pm'])],
            ['name' => 'McCormick & Kuleto\'s', 'schedule' => json_encode(['Mon-Thu, Sun' => '11:30 am - 10 pm', 'Fri-Sat' => '11:30 am - 11 pm'])],
            ['name' => 'Mifune Restaurant', 'schedule' => json_encode(['Mon-Sun' => '11 am - 10 pm'])],
            ['name' => 'The Cheesecake Factory', 'schedule' => json_encode(['Mon-Thu' => '11 am - 11 pm', 'Fri-Sat' => '11 am - 12:30 am', 'Sun' => '10 am - 11 pm'])],
            // Add remaining restaurants as needed
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}