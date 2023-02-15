<?php

use App\Http\Controllers\ApiController;
use App\Models\Activities;
use App\Models\activities_responses;
use App\Models\Disciplines;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/disciplines', ApiController::class);
Route::get('/disciplines/{activities}/activities', function(Activities $activities){
    return$activities->activity;
});