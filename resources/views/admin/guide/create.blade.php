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
        <h3 class='ms-3'>{{ __('admin.manage_guides') }}</h3>
    </div>

    <div class='card-body'>
        <form action="{{ route('admin.guide.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">{{ __('admin.table_header_guide_title') }}</label>
                <input name="title" value="{{ old('name') }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('admin.table_header_guide_content') }}</label>
                <input type="text" name="content" value="{{ old('content') }}" class="form-control"></input>
            </div>
            <div class="mb-3">
                <input type="file" name="image" value="{{ old('image') }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary ms-3">{{ __('admin.button_guide_create') }}</button>
        </form>
    </div>
</div>
@endsection