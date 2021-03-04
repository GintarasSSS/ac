<?php

use App\Http\Controllers\City;
use App\Http\Controllers\Weather;
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
    return view('welcome');
});

Route::get('city', [City::class, 'index']);
Route::get('weather', [Weather::class, 'index']);
