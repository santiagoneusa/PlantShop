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
        <h3 class='ms-3'>Editing {{ $viewData['plant']->getName() }}</h3>
    </div>

    <div class='card-body'>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.plant.update', ['id' => $viewData["plant"]->getId()]) }}" method="get" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" class="form-control" value="{{ $viewData["plant"]->getName() }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{ $viewData["plant"]->getDescription() }}">
            </div>
            <div class="mb-3" type="number" >
                <label class="form-label">Price</label>
                <input name="price" class="form-control" value="{{ $viewData["plant"]->getPrice() }}">
            </div>
            <div class="mb-3" type="number" >
                <label class="form-label">Stock</label>
                <input name="stock" class="form-control" value="{{ $viewData["plant"]->getStock() }}">
            </div>
            <div class="mb-3">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <select class="form-select" name="category_id">
                <option value="{{ $viewData['category_id'] }}" selected disabled>{{ $viewData['category_name'] }}</option>
                    @foreach($viewData["categories"] as $category)
                        <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                    @endforeach
                </select>
                <div class="form-text ms-2" id="basic-addon4">Current value: {{ $viewData['category_name'] }}</div>
            </div>
            <button type="submit" class="btn btn-primary ms-3">Update</button>
        </form>
        <div class="mb-3">
            <form action="{{ route('admin.plant.index') }}" method="get">
                @csrf
                <button class="btn btn-danger ms-3 mt-2">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection