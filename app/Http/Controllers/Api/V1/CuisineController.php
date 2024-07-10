<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CuisineCollection;
use App\Http\Resources\V1\CuisineResource;
use App\Http\Resources\V1\RestaurantCollection;
use App\Models\Cuisine;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): CuisineCollection
    {
        return new CuisineCollection(Cuisine::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuisine $cuisine): CuisineResource
    {
        return new CuisineResource($cuisine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuisine $cuisine): RestaurantCollection
    {
        $restaurants = $cuisine->restaurants;
        $cuisine->delete();

        return new RestaurantCollection($restaurants);
    }
}
