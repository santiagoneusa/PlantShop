<?php

use Illuminate\Support\Facades\Route;

Route::get('/plants', 'App\Http\Controllers\PlantController@index')->name('plant.index');
Route::get('/plants/search', 'App\Http\Controllers\PlantController@search')->name('plant.search');
Route::get('/plants/{id}', 'App\Http\Controllers\PlantController@show')->name('plant.show');