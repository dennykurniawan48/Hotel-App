<?php

use App\Http\Controllers\Api\KotaApi;
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

Route::post('/kota', 'App\Http\Controllers\Api\KotaApi@store');
Route::get('/kota', 'App\Http\Controllers\Api\KotaApi@index');
Route::get('/kota/{id}', 'App\Http\Controllers\Api\KotaApi@show');
Route::get('/hotel', 'App\Http\Controllers\Api\HotelApi@index');
Route::get('/hotel/{id}', 'App\Http\Controllers\Api\HotelApi@show');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/booking', 'App\Http\Controllers\Api\BookingApi@store');
    Route::get('/booking/{id}', 'App\Http\Controllers\Api\BookingApi@show');
});