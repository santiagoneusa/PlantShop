<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class='card m-5'>
    <div class='card-header d-flex justify-content-between align-items-center'>
        <h3 class='ms-3'>Manage Plants</h3>
        <form action="{{ route('admin.plant.create') }}" method="GET" class="d-flex mt-2">
            <button type="submit" class="btn btn-primary me-3">Create Plant</button>
        </form>
    </div>

    <div class='card-body'>
        <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Stock</th>
                    <th scope='col'>Edit</th>
                    <th scope='col'>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['plants'] as $plant)
                <tr>
                    <td><a href="{{ route('admin.plant.show', ['id' => $plant->getId()]) }}">{{ $plant->getId() }}</a>
                    </td>
                    <td>{{ $plant->getName() }}</td>
                    <td>{{ $plant->getStock() }}</td>
                    <td>
                        <form action="{{ route('admin.plant.edit', ['id' => $plant->getId()]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-primary"><span class="material-symbols-outlined">edit</span></button>
                        </form>
                    </td>
                    <td><a href="{{ route('admin.plant.delete', ['id' => $plant->getId()]) }}"></a>
                        <form action="{{ route('admin.plant.delete', $plant->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><span class="material-symbols-outlined">delete</span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection