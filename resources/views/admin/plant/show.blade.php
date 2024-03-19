@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card-header">
    <h1 class="ms-5">{{ $viewData["plant"]->getName() }} Information</h1>
</div>
<div class="m-3 row">
    <div class="col-md-4">
        <img src="{{ asset('/storage/plants/'.$viewData["plant"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $viewData["plant"]->getName() }}</h5>
            <p class="card-text">ID: {{ $viewData["plant"]->getId() }}</p>
            <p class="card-text">Description: {{ $viewData["plant"]->getDescription() }}</p>
            <p class="card-text">Price: ${{ $viewData["plant"]->getPrice() }}</p>
            <p class="card-text">Remaining Stock: {{ $viewData["plant"]->getStock() }} units</p>
            <p class="card-text">Category: {{ $viewData["category_name"] }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <form action="{{ route('admin.plant.edit', ['id' => $viewData["plant"]->getId()]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <button type="submit" class="btn btn-primary me-2">Edit</button>
        </form>
        <form action="{{ route('admin.plant.delete', $viewData['plant']->getId())}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

@endsection