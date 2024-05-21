<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/profile', 'App\Http\Controllers\UserController@index')->name('user.index');

    Route::post('/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');

    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
});
