<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Util;

use App\Interfaces\BookService;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class OpenLibraryService implements BookService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetchBooks(int $perPage = 10, int $currentPage = 1): array
    {
        $response = $this->makeApiRequest($perPage, $currentPage);
        $data = $this->parseApiResponse($response);
        $books = $this->collectBooksData($data);

        return [
            'books' => $books,
            'total' => $data['numFound'],
            'perPage' => $perPage,
            'currentPage' => $currentPage,
        ];
    }

    private function makeApiRequest(int $perPage, int $currentPage)
    {
        return $this->client->get('https://openlibrary.org/search.json', [
            'query' => [
                'q' => 'guide for plants',
                'fields' => 'title,author_name,ebook_access,publish_year,language',
                'page' => $currentPage,
                'limit' => $perPage,
            ]
        ]);
    }

    private function parseApiResponse($response): array
    {
        return json_decode($response->getBody(), true);
    }

    private function collectBooksData(array $data): Collection
    {
        return collect($data['docs']);
    }

    private function paginateBooks(Collection $books, int $total, int $perPage, int $currentPage): LengthAwarePaginator
    {
        return new LengthAwarePaginator(
            $books->forPage($currentPage, $perPage),
            $total,
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );
    }

}