<?php

// Made by: Santiago Neusa Ruiz & Jhonnathan Stiven Ocampo Díaz

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

include __DIR__.'/admin/routes.php';
include __DIR__.'/auth/routes.php';
include __DIR__.'/cart/routes.php';
include __DIR__.'/categories/routes.php';
include __DIR__.'/guide/routes.php';
include __DIR__.'/plant/routes.php';
include __DIR__.'/books/routes.php';