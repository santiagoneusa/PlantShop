<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/profile', 'App\Http\Controllers\UserController@index')->name('user.index');

Route::get('/plants', 'App\Http\Controllers\PlantController@index')->name('plant.index');
Route::get('/plants/search', 'App\Http\Controllers\PlantController@search')->name('plant.search');
Route::get('/plants/{id}', 'App\Http\Controllers\PlantController@show')->name('plant.show');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');

Route::get('/guides', 'App\Http\Controllers\GuideController@index')->name('guide.index');
Route::get('/guides/{id}', 'App\Http\Controllers\GuideController@show')->name('guide.show');

Route::post('/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');

    Route::get('/admin/plants', 'App\Http\Controllers\Admin\AdminPlantController@index')->name('admin.plant.index');
    Route::get('/admin/plants/create', 'App\Http\Controllers\Admin\AdminPlantController@create')->name('admin.plant.create');
    Route::post('/admin/plants/save', 'App\Http\Controllers\Admin\AdminPlantController@save')->name('admin.plant.save');
    Route::delete('/admin/plants/{id}/delete', 'App\Http\Controllers\Admin\AdminPlantController@delete')->name('admin.plant.delete');
    Route::post('/admin/plants/{id}/edit', 'App\Http\Controllers\Admin\AdminPlantController@edit')->name('admin.plant.edit');
    Route::get('/admin/plants/{id}/update', 'App\Http\Controllers\Admin\AdminPlantController@update')->name('admin.plant.update');
    Route::get('/admin/plants/{id}', 'App\Http\Controllers\Admin\AdminPlantController@show')->name('admin.plant.show');

    Route::get('/admin/guides', 'App\Http\Controllers\Admin\AdminGuideController@index')->name('admin.guide.index');
    Route::get('/admin/guides/create', 'App\Http\Controllers\Admin\AdminGuideController@create')->name('admin.guide.create');
    Route::post('/admin/guides/save', 'App\Http\Controllers\Admin\AdminGuideController@save')->name('admin.guide.save');
    Route::delete('/admin/guides/{id}/delete', 'App\Http\Controllers\Admin\AdminGuideController@delete')->name('admin.guide.delete');
    Route::post('/admin/guides/{id}/edit', 'App\Http\Controllers\Admin\AdminGuideController@edit')->name('admin.guide.edit');
    Route::put('/admin/guides/{id}/update', 'App\Http\Controllers\Admin\AdminGuideController@update')->name('admin.guide.update');
    Route::get('/admin/guides/{id}', 'App\Http\Controllers\Admin\AdminGuideController@show')->name('admin.guide.show');
});
