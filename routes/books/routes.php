<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

use Illuminate\Support\Facades\Route;

Route::get('/books', 'App\Http\Controllers\Api\OpenLibraryController@index')->name('books.index');
