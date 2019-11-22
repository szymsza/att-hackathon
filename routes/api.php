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

// Temperature settings
Route::get("temperature/settings", "TemperatureController@getSettings");
Route::post("temperature/settings", "TemperatureController@setSettings");

// Chicken count
Route::get("chicken-count", "ChickenCountController@get");
Route::post("chicken-entry", "ChickenCountController@entry");

// Chicken count
Route::get("predator-breach", "PredatorBreachController@get");
Route::post("predator-breach", "PredatorBreachController@set");

// Door settings
Route::get("door/settings", "DoorController@getSettings");
Route::post("door/settings", "DoorController@setSettings");