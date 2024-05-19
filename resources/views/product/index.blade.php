<!-- Made by: Jhonnathan Stiven Ocampo Díaz -->

@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="row">
        @foreach ($viewData['products'] as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Description: {{ $product['description'] }}</p>
                        <p class="card-text">Category: {{ $product['category'] }}</p>
                        <p class="card-text">Price: ${{ $product['price'] }}</p>
                        <p class="card-text">Stock: {{ $product['stock'] }}</p>
                        <a href="{{ $product['link'] }}" class="btn btn-primary">Product Link</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
