<!-- Made by: Santiago Neusa Ruiz -->

@extends('layouts.app')
@section('title', $viewData["subtitle"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row row-cols-1 row-cols-md-3 align-items-center">
    <div class="card m-2" style="width: 492px;">
        <img class="card-img-top img-fluid" src="{{ asset('/img/cards/plant.jpg') }}">
        <div class="card-body">
            <h5 class="card-title">{{ __('app.plants') }}</h5>
            <p class="card-text">{{ __('app.card_plants_available') }}</p>
            <a href="{{ route('plant.index') }}" class="btn btn-success">{{ __('app.view_plants') }}</a>
        </div>
    </div>

    <div class="card m-2" style="width: 525px;">
        <img class="card-img-top img-fluid" src="{{ asset('/img/cards/category.jpg') }}">
        <div class="card-body">
            <h5 class="card-title">{{ __('app.category') }}</h5>
            <p class="card-text">{{ __('app.card_categories_available') }}</p>
            <a href="{{ route('category.index') }}" class="btn btn-success">{{ __('app.view_categories') }}</a>
        </div>
    </div>

    <div class="card m-2" style="width: 380px; height: 542px;">
        <img class="card-img-top img-fluid" src="{{ asset('/img/cards/guide.png') }}">
        <div class="card-body">
            <h5 class="card-title">{{ __('app.guides') }}</h5>
            <p class="card-text">{{ __('app.card_guides_available') }}</p>
            <a href="{{ route('guide.index') }}" class="btn btn-success">{{ __('app.view_guides') }}</a>
        </div>
    </div>
</div>
@endsection