<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/properties', PropertyController::class);
Route::apiResource('/states', StateController::class);
Route::apiResource('/cities', CityController::class);
Route::apiResource('/pictures', PictureController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
