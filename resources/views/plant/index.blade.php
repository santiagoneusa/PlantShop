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

    <form action={{ route('plant.search') }} method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search plants...">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <div class="row">
        @foreach ($viewData["plants"] as $plant)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="{{ $plant->getImageUrl() }}" class="card-img-top img-card">
                <div class="card-body text-center">
                    <h5>Product id: {{ $plant->getId() }}</h4>
                    <h6>{{ $plant->getName() }}</h5>
                    <a href="{{ route('plant.show', ['id'=> $plant->getId()]) }}" class="btn bg-primary text-white">More details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
