<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/plants', 'App\Http\Controllers\PlantController@index')->name('plant.index');
Route::get('/plants/search', 'App\Http\Controllers\PlantController@search')->name('plant.search');
Route::get('/plants/create', 'App\Http\Controllers\PlantController@create')->name('plant.create');
Route::post('/plants/save', 'App\Http\Controllers\PlantController@save')->name('plant.save');
Route::get('/plants/{id}', 'App\Http\Controllers\PlantController@show')->name('plant.show');
Route::delete('/plants/{id}', 'App\Http\Controllers\PlantController@delete')->name('plant.delete');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');

Route::get('/guides', 'App\Http\Controllers\GuideController@index')->name('guide.index');
Route::get('/guides/{id}', 'App\Http\Controllers\GuideController@show')->name('guide.show');

Route::post('/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');

Route::post('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');

Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
