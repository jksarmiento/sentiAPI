<?php

use App\Http\Controllers\Api\v1\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\LocationController;
use App\Http\Controllers\Api\v1\LogLocationController;
use App\Http\Controllers\Api\v1\LogStatusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\v1'], function () {
    Route::apiResource('carts', CartController::class);
    Route::apiResource('locations', LocationController::class);
    Route::apiResource('log_locations', LogLocationController::class);
    Route::apiResource('log_statuses', LogStatusController::class);
});
