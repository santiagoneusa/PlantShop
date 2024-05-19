<?php

use Illuminate\Support\Facades\Route;

Route::get('/books', 'App\Http\Controllers\Api\OpenLibraryController@index')->name('books.index');

