<!-- Made by: Santiago Neusa Ruiz -->

@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="mb-1 m-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class='card m-5'>

    <div class='card-header d-flex justify-content-between align-items-center'>
        <h3 class='ms-3'>Manage Plants</h3>
    </div>

    <div class='card-body'>
        <form action="{{ route('admin.plant.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" value="{{ old('name') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" value="{{ old('description') }}" class="form-control"></input>
            </div>
            <div class="mb-3" type="number" >
                <label class="form-label">Price</label>
                <input name="price" type="number" min="1" max="10" value="1" class="form-control quantity-input">
            </div>
            <div class="mb-3" type="number" >
                <label class="form-label">Stock</label>
                <input name="stock" type="number" min="1" max="10" value="1" class="form-control quantity-input">
            </div>
            <div class="mb-3">
                <input type="file" name="image" value="{{ old('image') }}" class="form-control">
            </div>
            <div class="mb-3">
                <select value="{{ old('category_id') }}" class="form-select" name="category_id">
                    <option selected>Select Category</option>
                    @foreach($viewData["categories"] as $category)
                        <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary ms-3">Create</button>
        </form>
    </div>
</div>
@endsection