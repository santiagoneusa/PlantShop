@extends('layouts.app')
@section('title', $viewData["subtitle"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row row-cols-1 row-cols-md-3 align-items-center">
    <div class="card m-2" style="width: 492px;">
        <img class="card-img-top img-fluid" src="{{ asset('/img/cards/plant.jpg') }}">
        <div class="card-body">
            <h5 class="card-title">Plants</h5>
            <p class="card-text">Visualize all plants available</p>
            <a href="{{ route('plant.index') }}" class="btn btn-success">View Plants</a>
        </div>
    </div>

    <div class="card m-2" style="width: 525px;">
        <img class="card-img-top img-fluid" src="{{ asset('/img/cards/category.jpg') }}">
        <div class="card-body">
            <h5 class="card-title">Category</h5>
            <p class="card-text">Visualize plants organized by differents light, function and enviroment</p>
            <a href="{{ route('category.index') }}" class="btn btn-success">View Category</a>
        </div>
    </div>

    <div class="card m-2" style="width: 380px; height: 542px;">
        <img class="card-img-top img-fluid" src="{{ asset('/img/cards/guide.png') }}">
        <div class="card-body">
            <h5 class="card-title">Guides</h5>
            <p class="card-text">How to water my plants? Which plants are better to me? All those questions answered here</p>
            <a href="{{ route('guide.index') }}" class="btn btn-success">View Guides</a>
        </div>
    </div>
</div>
@endsection