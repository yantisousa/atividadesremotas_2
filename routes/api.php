<?php

use App\Http\Controllers\ApiController;
use App\Models\Activities;
use App\Models\activities_responses;
use App\Models\Disciplines;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

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

Route::get('/disciplines/{activities}/episodes', function (activities_responses $activities, Request $request) {
    dd($activities->check);
    $activities->check = $request->check;
    $activities->save();
});
Route::post('/login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);
    $dados = User::whereEmail($credentials['email'])->first();
   if(Auth::attempt($credentials) === false){
        return response()->json('Senha incorreta');
   }
   $user = Auth::user();
   $token = $user->createToken('token');
   return response()->json($token->plainTextToken);
});