@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class='card m-5'>
    <div class='card-header d-flex justify-content-between align-items-center'>
        <h3 class='ms-3'>Manage Plants</h3>
    </div>

    <div class='card-body'>
        <form action="{{ route('admin.plant.save') }}" method="POST">
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
                <input name="price" value="{{ old('price') }}" class="form-control">
            </div>
            <div class="mb-3" type="number" >
                <label class="form-label">Stock</label>
                <input name="stock" value="{{ old('stock') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" value="{{ old('category') }}" class="form-select">
                    <option selected></option>
                    <option value="1">Indoor</option>
                    <option value="2">Outdoor</option>
                    <option value="3">Ornamental</option>
                    <option value="3">Aromatic</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary ms-3">Create</button>
        </form>
    </div>
</div>
@endsection