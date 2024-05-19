<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\BookService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use App\Models\Category;

class OpenLibraryController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(Request $request): View
    {
        $currentPage = $request->input('page', 1);
        $perPage = 12;

        $booksData = $this->bookService->fetchBooks($perPage, $currentPage);

        $viewData = [];
        $viewData['title'] = 'Books - Garden of Eden';
        $viewData['subtitle'] = 'Books';
        $viewData['categories'] = Category::all();
        $viewData['books'] = new LengthAwarePaginator(
            $booksData['books'],
            $booksData['total'],
            $booksData['perPage'],
            $booksData['currentPage'],
            ['path' => url()->current()]
        );

        return view('books.index')->with('viewData', $viewData);
    }
}
