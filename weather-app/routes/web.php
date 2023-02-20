<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/cities', [CityController::class, 'index']);
Route::post('/new-city', [CityController::class, 'store']);
Route::post('/city/{name}/delete', [CityController::class, 'delete']);
Route::get('/weather/{name}', [WeatherController::class, 'getCurrentWeather']);
Route::get('/weather/weekly/{name}', [WeatherController::class, 'getWeeklyWeather']);
