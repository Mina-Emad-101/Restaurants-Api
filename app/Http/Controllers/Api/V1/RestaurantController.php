<?php

namespace App\Http\Controllers\Api\V1;

use App\Builders\V1\RestaurantQueryBuilder;
use App\Filters\V1\RestaurantFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Http\Resources\V1\RestaurantCollection;
use App\Http\Resources\V1\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): RestaurantCollection
    {
        $restaurants = Restaurant::with(['location']);

        $filter = new RestaurantFilter;
        $restaurants = new RestaurantQueryBuilder($restaurants, $request, $filter);
        $restaurants = $restaurants
            ->filterByEquality()
            ->filterByBooleans();

        $restaurants = $restaurants->paginate(10);

        return new RestaurantCollection($restaurants->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request): RestaurantResource
    {
        $values = $request->all();

        return new RestaurantResource(Restaurant::create($values));
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant, Request $request): RestaurantResource
    {
        $restaurant = $restaurant->with(['location']);

        $filter = new RestaurantFilter;
        $restaurant = new RestaurantQueryBuilder($restaurant, $request, $filter);
        $restaurant = $restaurant
            ->filterByEquality()
            ->filterByBooleans()
            ->first();

        return new RestaurantResource($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant): void
    {
        //
    }
}
