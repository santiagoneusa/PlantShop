@extends('layouts.app')
@section('title', $viewData["subtitle"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
        @foreach ($viewData["categories"] as $category)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card h-100">
                <img src="{{ asset('/img/categories/'.$category->getImage()) }}" class="card-img-top img-card">
                <div class="card-body text-center">
                    <h5>{{ $category->getName() }}</h4>
                    <p>{{ $category->getDescription() }}</p>
                    <br>
                    <a href="{{ route('category.show', ['id'=> $category->getId()]) }}" class="btn bg-primary text-white">More details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection