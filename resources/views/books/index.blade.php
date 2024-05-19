<!-- Made by: Jhonnathan Stiven Ocampo Díaz -->
<link href="{{ asset('css/pagination.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="card mb-3">
  <div class="card-body text-center">
    <h4>Do you want to know more about how to care for your plants? We leave you a list of books that could be useful for this. Cheer up and look for more ways to take care of your plants</h4>
  </div>
</div>

<div class="container">
    <div class="row">
        @if ($viewData["books"]->count())
            @foreach ($viewData["books"] as $book)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5>{{ $book['title'] }}</h5>
                        <p>
                            <strong>Author:</strong> {{ implode(', ', $book['author_name'] ?? ['N/A']) }}<br>
                            <strong>Year:</strong> {{ $book['publish_year'][0] ?? 'N/A' }}<br>
                            <strong>Language:</strong> {{ implode(', ', $book['language'] ?? ['N/A']) }}
                        </p>
                        <br>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p>No books found.</p>
        @endif
    </div>
    <div class="justify-content-center pagination">
        {{ $viewData["books"]->links() }}
    </div>
</div>
@endsection
