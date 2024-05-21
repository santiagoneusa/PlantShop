@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/plants/' .$viewData["plant"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ __('app.colon_formatted_plant_name', ['name' => $viewData["plant"]->getName()]) }}</h5>
        <p class="card-text">{{ __('app.colon_formatted_plant_id', ['id' => $viewData["plant"]->getId()]) }}</p>
        <p class="card-text">{{ __('app.colon_formatted_plant_description', ['description' => $viewData["plant"]->getDescription()]) }}</p>
        <p class="card-text">{{ __('app.colon_formatted_plant_price', ['price' => $viewData["plant"]->getPrice()]) }}</p>
        <p class="card-text">{{ __('app.colon_formatted_plant_stock', ['stock' => $viewData["plant"]->getStock()]) }}</p>
        
        @guest
        <div class="alert alert-info">
            {{ __('app.comments_login') }}
            <br>
            <div class="d-grid gap-2 col-4 mt-1">
              <a href="{{ route('login') }}" class="btn btn-primary btn-sm">{{ __('auth.login') }}</a>
            </div>
        </div>

        @else
        
        <p class="card-text">
          <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['plant']->getId()]) }}">
            <div class="row">
              @csrf
              <div class="col-auto">
                <div class="input-group col-auto">
                  <div class="input-group-text">{{ __('app.table_header_product_quantity') }}</div>
                    <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                  </div>
                </div>
                <div class="col-auto">
                <button class="btn bg-primary text-white" type="submit">{{ __('app.add_to_cart') }}</button>
              </div>
            </div>
          </form>
        </p>
        
        <h5 class="mt-4">{{ __('app.comments') }}</h5>
        @foreach ($viewData["reviews"] as $review)
        <div class="card mb-3">
          <div class="card-body">
            <p>{{ $review->getContent() }}</p>
            <p>{{ __('app.stars', ['stars' => $review->getStars()]) }}</p>
          </div>
        </div>
        @endforeach
        <br>

                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif

        @if($errors->any())
          <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif
        
        <form method="POST" action="{{ route('review.save') }}">
          @csrf
          <input type="hidden" name="plant_id" value="{{ $viewData['plant']->getId() }}">
          <div class="form-group">
            <label for="content">{{ __('app.add_comment') }}</label>
            <textarea class="form-control" name="content" rows="3">{{ old('content') }}</textarea>
            <input type="number" class="form-control mb-2 mt-2" name="stars" placeholder="{{ __('app.rating') }}">
          <br>
          </div>
          <button type="submit" class="btn btn-success">{{ __('app.button_comment_send') }}</button>
        </form>
        @endguest
        <br>
        
      </div>
    </div>
  </div>
</div>
@endsection