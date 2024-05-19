<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BookService;
use App\Util\OpenLibraryService;
use GuzzleHttp\Client;

class BookServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BookService::class, function () {
            return new OpenLibraryService(new Client());
        });
    }
}