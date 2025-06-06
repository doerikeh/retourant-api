<?php

namespace App\Services;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;

class RestaurantService
{
    public function getAllRestaurants(array $filters = []): Collection
    {
        $query = Restaurant::query();

        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        $restaurants = $query->get();

        if (!empty($filters['date'])) {
            $dateKey = trim($filters['date']);
            $hoursValue = !empty($filters['hours']) ? trim($filters['hours']) : null;

            $dateKey = str_replace('  ', ' ', $dateKey);
            if ($hoursValue) {
                $hoursValue = str_replace("\xc2\xa0", ' ', $hoursValue);
                $hoursValue = str_replace(['–', '—', '−'], '-', strtolower(trim($hoursValue)));
                $hoursValue = str_replace('  ', ' ', $hoursValue);
            }

            $filteredRestaurants = new Collection();
            foreach ($restaurants as $restaurant) {
                $schedule = is_array($restaurant->schedule) ? $restaurant->schedule : (is_string($restaurant->schedule) ? json_decode($restaurant->schedule, true) : []);
                $scheduleKeys = array_keys($schedule);
                $lowercaseKeys = array_map('strtolower', $scheduleKeys);
                $matchedKeyIndex = array_search(strtolower($dateKey), $lowercaseKeys);
                if ($matchedKeyIndex !== false) {
                    $matchedKey = $scheduleKeys[$matchedKeyIndex]; // Use the original key
                    if ($hoursValue) {
                        $scheduleValue = str_replace("\xc2\xa0", ' ', $schedule[$matchedKey]);
                        $scheduleValue = str_replace(['–', '—', '−'], '-', strtolower(trim($scheduleValue)));
                        $scheduleValue = str_replace('  ', ' ', $scheduleValue);
                        if ($scheduleValue === $hoursValue) {
                            $filteredRestaurants->push($restaurant);
                        } 
                    } else {
                        $filteredRestaurants->push($restaurant);
                    }
                } 
            }

            $restaurants = $filteredRestaurants;
        }

        return $restaurants;
    }

    public function createRestaurant(array $data): Restaurant
    {
        return Restaurant::create($data);
    }

    public function updateRestaurant(Restaurant $restaurant, array $data): Restaurant
    {
        $restaurant->update($data);
        return $restaurant;
    }

    public function deleteRestaurant(Restaurant $restaurant): void
    {
        $restaurant->delete();
    }
}
