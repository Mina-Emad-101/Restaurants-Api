<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CuisineCollection;
use App\Http\Resources\V1\CuisineResource;
use App\Models\Cuisine;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CuisineCollection(Cuisine::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuisine $cuisine)
    {
        return new CuisineResource($cuisine);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuisine $cuisine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuisine $cuisine)
    {
        //
    }
}
