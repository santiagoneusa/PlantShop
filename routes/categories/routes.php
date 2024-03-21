<?php

use Illuminate\Support\Facades\Route;

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');
