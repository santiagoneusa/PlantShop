<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/plants', 'App\Http\Controllers\PlantController@index')->name('plant.index');
Route::get('/plants/search', 'App\Http\Controllers\PlantController@search')->name('plant.search');
Route::get('/plants/create', 'App\Http\Controllers\PlantController@create')->name('plant.create');
Route::post('/plants/save', 'App\Http\Controllers\PlantController@save')->name('plant.save');
Route::get('/plants/{id}', 'App\Http\Controllers\PlantController@show')->name('plant.show');
Route::delete('/plants/{id}', 'App\Http\Controllers\PlantController@delete')->name('plant.delete');

Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
