<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\LocationCollection;
use App\Http\Resources\V1\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location): LocationResource
    {
        return new LocationResource($location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location): void
    {
        //
    }
}
