<?php

Route::get('/products', 'App\Http\Controllers\Api\ProductApiController@index')->name('product.index');
