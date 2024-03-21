<?php

use Illuminate\Support\Facades\Route;

Route::get('/guides', 'App\Http\Controllers\GuideController@index')->name('guide.index');
Route::get('/guides/{id}', 'App\Http\Controllers\GuideController@show')->name('guide.show');
