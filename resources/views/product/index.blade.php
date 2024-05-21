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
                        <p class="card-text">{{ __('app.colon_formatted_product_description', ['description' => $product['description']]) }}</p>
                        <p class="card-text">{{ __('app.colon_formatted_product_category', ['category' => $product['category']]) }}</p>
                        <p class="card-text">{{ __('app.colon_formatted_product_price', ['price' => $product['price']]) }}</p>
                        <p class="card-text">{{ __('app.colon_formatted_product_stock', ['stock' => $product['stock']]) }}</p>
                        <a href="{{ $product['link'] }}" class="btn btn-primary">{{ __('app.product_link') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
