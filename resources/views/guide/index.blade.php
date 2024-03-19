@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    @foreach ($viewData["guides"] as $guide)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card h-100">
            <img src="{{ asset('/storage/guides/'.$guide->getImage()) }}" class="card-img-top img-card">
            <div class="card-body text-center">
                <h5>{{ $guide->getTitle() }}</h4>
                <p>{{ Str::limit($guide->getContent(), 100) }}</p>
                <br>
                <a href="{{ route('guide.show', ['id'=> $guide->getId()]) }}" class="btn bg-primary text-white">More details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection