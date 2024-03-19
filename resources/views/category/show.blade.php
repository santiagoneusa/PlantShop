<!-- Made by: Jhonnathan Stiven Ocampo Díaz -->

@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    @foreach ($viewData["plants"] as $plant)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
        <img src="{{ asset('/storage/plants/' . $plant->getImage()) }}" class="card-img-top img-card">
            <div class="card-body text-center">
                <h5>{{ $plant->getName() }}</h5>
                <a href="{{ route('plant.show', ['id'=> $plant->getId()]) }}" class="btn bg-primary text-white">More details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection