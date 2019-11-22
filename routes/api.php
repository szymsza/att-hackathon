<?php

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


// Humidity data
Route::get("humidity", "HumidityController@get");
Route::post("humidity", "HumidityController@set");

// Temperature data
Route::get("temperature", "TemperatureController@get");
Route::post("temperature", "TemperatureController@set");

// Sunlight data
Route::post("sunlight", "SunlightController@set");

// Chicken count
Route::get("chicken-count", "ChickenCountController@get");
Route::post("chicken-entry", "ChickenCountController@entry");