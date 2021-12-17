<?php

use App\Http\Controllers\KotaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/kota', 'App\Http\Controllers\KotaController@index');
Route::get('/hotel', 'App\Http\Controllers\HotelController@index');
Route::get('/createhotel', 'App\Http\Controllers\HotelController@create');
Route::post('/addhotel', 'App\Http\Controllers\HotelController@store');
Route::get('/booking', 'App\Http\Controllers\BookingController@index');