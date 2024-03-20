@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/guides/'.$viewData["guide"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body m-3">
        <h5 class="card-title">{{ $viewData["guide"]->getTitle() }}</h5>
        <br>
        <p class="card-text">Description: {{ $viewData["guide"]->getContent() }}</p>
    </div>
</div>
@endsection