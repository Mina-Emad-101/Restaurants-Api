<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteLocationRequest;
use App\Http\Resources\V1\LocationCollection;
use App\Http\Resources\V1\LocationResource;
use App\Http\Resources\V1\RestaurantCollection;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): LocationCollection
    {
        return new LocationCollection(Location::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location): LocationResource
    {
        return new LocationResource($location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteLocationRequest $request, Location $location): RestaurantCollection
    {
        $restaurants = $location->restaurants;
        $location->delete();

        return new RestaurantCollection($restaurants);
    }
}
