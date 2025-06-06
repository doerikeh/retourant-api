<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Services\RestaurantService;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\JsonResponse;

class RestaurantController extends Controller
{
    protected $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function index(): JsonResponse
    {
        $filters = request()->only(['name', 'date', 'hours']);
        $restaurants = $this->restaurantService->getAllRestaurants($filters);
        return response()->json(['data' => RestaurantResource::collection($restaurants)], 200);
    }

    public function store(CreateRestaurantRequest $request): JsonResponse
    {
        $restaurant = $this->restaurantService->createRestaurant($request->validated());
        return response()->json(['data' => new RestaurantResource($restaurant)], 201);
    }

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant): JsonResponse
    {
        $restaurant = $this->restaurantService->updateRestaurant($restaurant, $request->validated());
        return response()->json(['data' => new RestaurantResource($restaurant)], 200);
    }

    public function destroy(Restaurant $restaurant): JsonResponse
    {
        $this->restaurantService->deleteRestaurant($restaurant);
        return response()->json(['message' => 'Restaurant deleted'], 200);
    }
}