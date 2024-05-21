<!-- Made by: Santiago Neusa Ruiz -->

@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card-header">
    <h1 class="ms-5">{{ __('admin.admin_panel') }}</h1>
</div>

<div class="m-3 row">
    <div class="col-3">
        <div class="card h-100">
            <img class="card-img-top img-fluid" src="{{ asset('/img/cards/plant.jpg') }}">
            <div class="card-body">
                <h5 class="card-title">{{ __('admin.plants') }}</h5>
                <p class="card-text">{{ __('admin.default_card_text_plants') }}</p>
                <a href="{{ route('admin.plant.index') }}" class="btn btn-primary">{{ __('admin.manage_plants') }}</a>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card h-100">
            <img class="card-img-top img-fluid" src="{{ asset('/img/cards/guide.png') }}">
            <div class="card-body">
                <h5 class="card-title">{{ __('admin.guides') }}</h5>
                <p class="card-text">{{ __('admin.default_card_text_guides') }}</p>
                <a href="{{ route('admin.guide.index') }}" class="btn btn-primary">{{ __('admin.manage_guides') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection