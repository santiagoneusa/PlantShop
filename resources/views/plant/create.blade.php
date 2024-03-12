@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create plant</div>
          <div class="card-body">
            @if(Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('plant.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter the name of the plant" name="name" value="{{ old('name') }}" />
              <input type="textarea" class="form-control mb-2" placeholder="Enter the description of the plant" name="description" value="{{ old('description') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter the image url of the plant" name="imageUrl" value="{{ old('imageUrl') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter the price of the plant" name="price" value="{{ old('price') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter the stock of the plant" name="stock" value="{{ old('stock') }}" />
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
