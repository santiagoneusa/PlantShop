<?php 

namespace App\Interfaces;
use illuminate\Http\Request;

interface BookService
{
    public function fetchBooks(): array;
}