@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    @if (Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif

    <form action="{{ route('plant.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search plants...">
            <button type="submit" class="btn btn-success">{{ __('app.button_search') }}</button>
        </div>
    </form>

    <form action="{{ route('plant.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <select name="sort_by" class="form-select">
                <option selected>{{ __('app.select_plants_filter') }}</option>
                <option value="newest">{{ __('app.select_newest_to_oldest') }}</option>
                <option value="oldest">{{ __('app.select_oldest_to_newest') }}</option>
                <option value="price_high">{{ __('app.select_price_lower_to_higher') }}</option>
                <option value="price_low">{{ __('app.select_price_higher_to_lower') }}</option>
            </select>
            <button type="submit" class="btn btn-success">{{ __('app.apply_filter') }}</button>
        </div>
    </form>

    <div class="row">
        @foreach ($viewData["plants"] as $plant)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="{{ asset('/storage/plants/' . $plant->getImage()) }}" class="card-img-top img-card">
                <div class="card-body text-center">
                    <h5>Product id: {{ $plant->getId() }}</h4>
                    <h6>{{ $plant->getName() }}</h5>
                    <a href="{{ route('plant.show', ['id'=> $plant->getId()]) }}" class="btn bg-primary text-white">{{ __('app.more_details') }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
