@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/' .$viewData["plant"]->getImage()) }}" class="img-fluid rounded-start">
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
        <form action="{{ route('plant.show', ['id'=> $viewData["plant"]->getId()]) }}" method="GET" class="mb-3">
          <div class="input-group">
            <select name="sort_by" class="form-select">
              <option value="newest">Newest first</option>
              <option value="oldest">Oldest first</option>
              <option value="highest_rated">Highest rated first</option>
              <option value="lowest_rated">Lowest rated first</option>
            </select>
            <button type="submit" class="btn btn-success">Sort Comments</button>
          </div>
        </form>

        <h5 class="mt-4">Comments</h5>
        @if ($viewData["reviews"]->isEmpty())
          <p>No comments yet.</p>
        @else  
          @foreach ($viewData["reviews"] as $review)
          <div class="card mb-3">
            <div class="card-body">
              <p>{{ $review->getContent() }}</p>
              <p>Calificación: {{ $review->getStars() }}/5</p>
            </div>
          </div>
          @endforeach
        @endif

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

      </div>
    </div>
  </div>
</div>
@endsection
