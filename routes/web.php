<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\LocaleCookieMiddleware;


Route::get('/locale/{locale}', 'App\Http\Controllers\HomeController@locale')->name('locale');

Route::middleware(LocaleCookieMiddleware::class)->group(function () {

    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
   
    Auth::routes();
    
    include __DIR__.'/admin/routes.php';
    include __DIR__.'/auth/routes.php';
    include __DIR__.'/cart/routes.php';
    include __DIR__.'/categories/routes.php';
    include __DIR__.'/guide/routes.php';
    include __DIR__.'/plant/routes.php';
    include __DIR__.'/books/routes.php';
    include __DIR__.'/product/routes.php';

});