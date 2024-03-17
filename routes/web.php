<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/profile', 'App\Http\Controllers\UserController@index')->name('user.index');

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

Route::get('/admin/plants', 'App\Http\Controllers\Admin\AdminPlantController@index')->name('admin.plant.index');
Route::get('/admin/plants/create', 'App\Http\Controllers\Admin\AdminPlantController@create')->name('admin.plant.create');
Route::post('/admin/plants/save', 'App\Http\Controllers\Admin\AdminPlantController@save')->name('admin.plant.save');
Route::get('/admin/plants/{id}', 'App\Http\Controllers\Admin\AdminPlantController@show')->name('admin.plant.show');
Route::post('/admin/plants/{id}', 'App\Http\Controllers\Admin\AdminPlantController@edit')->name('admin.plant.edit');
Route::delete('/admin/plants/{id}', 'App\Http\Controllers\Admin\AdminPlantController@delete')->name('admin.plant.delete');

Route::get('/admin/guides', 'App\Http\Controllers\Admin\AdminGuideController@index')->name('admin.guide.index');
Route::get('/admin/guides/create', 'App\Http\Controllers\Admin\AdminGuideController@create')->name('admin.guide.create');
Route::post('/admin/guides/save', 'App\Http\Controllers\Admin\AdminGuideController@save')->name('admin.guide.save');
Route::get('/admin/guides/{id}', 'App\Http\Controllers\Admin\AdminGuideController@show')->name('admin.guide.show');
Route::post('/admin/guides/{id}', 'App\Http\Controllers\Admin\AdminGuideController@edit')->name('admin.guide.edit');
Route::delete('/admin/guides/{id}', 'App\Http\Controllers\Admin\AdminGuideController@delete')->name('admin.guide.delete');
