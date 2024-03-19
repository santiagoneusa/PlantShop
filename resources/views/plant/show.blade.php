@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/plants/' .$viewData["plant"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $viewData["plant"]->getName() }}</h5>
        <p class="card-text">ID: {{ $viewData["plant"]->getId() }}</p>
        <p class="card-text">Description: {{ $viewData["plant"]->getDescription() }}</p>
        <p class="card-text">Price: ${{ $viewData["plant"]->getPrice() }}</p>
        <p class="card-text">Remaining Stock: {{ $viewData["plant"]->getStock() }} units</p>
        
        @guest
        <div class="alert alert-info">
            You must log in to comment and view comments.
            <br>
            <div class="d-grid gap-2 col-4 mt-1">
              <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Log In</a>
            </div>
        </div>

        @else
        <h5 class="mt-4">Comments</h5>
        @foreach ($viewData["reviews"] as $review)
        <div class="card mb-3">
          <div class="card-body">
            <p>{{ $review->getContent() }}</p>
            <p>{{ $review->getStars() }}</p>
          </div>
        </div>
        @endforeach
        <br>

                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif

        @if($errors->any())
          <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif
        
        <form method="POST" action="{{ route('review.save') }}">
          @csrf
          <input type="hidden" name="plant_id" value="{{ $viewData["plant"]->getId() }}">
          <div class="form-group">
            <label for="content">Add Comment</label>
            <textarea class="form-control" name="content" rows="3"></textarea>
            <input type="number" class="form-control mb-2 mt-2" name="stars" placeholder="How would you rate this product on a scale of one to five?">
          <br>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
        @endguest
        <br>
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