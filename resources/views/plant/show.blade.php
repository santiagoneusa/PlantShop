@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $viewData["plant"]->getImageUrl() }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $viewData["plant"]->getName() }}</h5>
        <p class="card-text">ID: {{ $viewData["plant"]->getId() }}</p>
        <p class="card-text">Description: {{ $viewData["plant"]->getDescription() }}</p>
        <p class="card-text">Price: ${{ $viewData["plant"]->getPrice() }}</p>
        <p class="card-text">Remaining Stock: {{ $viewData["plant"]->getStock() }} units</p>
        <form method="POST" action="{{ route('plant.delete', ['id' => $viewData["plant"]->getId()]) }}" onsubmit="return confirm('Are you sure you want to delete this plant?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete Plant</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
