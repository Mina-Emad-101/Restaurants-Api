<?php

use App\Http\Controllers\Api\V1\CuisineController;
use App\Http\Controllers\Api\V1\LocationController;
use App\Http\Controllers\Api\V1\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('restaurants', RestaurantController::class);
    Route::post('restaurants/bulk', ['uses' => 'RestaurantController@bulkStore']);

    Route::apiResource('locations', LocationController::class);

    Route::apiResource('cuisines', CuisineController::class);
});
