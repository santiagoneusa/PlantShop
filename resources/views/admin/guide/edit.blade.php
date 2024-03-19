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
        <h3 class='ms-3'>Edting {{ $viewData['guide']->getTitle() }}</h3>
    </div>

    <div class='card-body'>
        <form action="{{ route('admin.guide.update', ['id' => $viewData["guide"]->getId()]) }}" method="get" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" class="form-control" value="{{ $viewData["guide"]->getTitle() }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <input type="text" name="content" class="form-control" value="{{ $viewData["guide"]->getContent() }}">
            </div>

            <div class="mb-3">
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary ms-3">Update</button>
        </form>
        <div class="mb-3">
            <form action="{{ route('admin.guide.index') }}" method="get">
                @csrf
                <button class="btn btn-danger ms-3 mt-2">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection