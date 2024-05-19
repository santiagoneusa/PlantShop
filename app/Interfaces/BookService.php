<?php 

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Interfaces;
use illuminate\Http\Request;

interface BookService
{
    public function fetchBooks(): array;
}