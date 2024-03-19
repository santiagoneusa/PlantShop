@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $viewData["guide"]->getImage() }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $viewData["guide"]->getName() }}</h5>
        <p class="card-text">Description: {{ $viewData["guide"]->getDescription() }}</p>
    </div>
</div>
@endsection