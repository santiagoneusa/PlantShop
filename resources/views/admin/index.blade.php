@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<div class="card-header">
    <h1>Admin Panel - Home Page</h1>
</div>

<div class="m-3 row">

    <div class="col-3">
        <div class="card">
            <img class="card-img-top img-fluid" src="{{ asset('/img/plant_card.jpg') }}">
            <div class="card-body">
                <h5 class="card-title">Plants</h5>
                <p class="card-text">Create, delete or edit the plants of the database</p>
                <a href="#" class="btn btn-primary">Manage Plants</a>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card">
            <img class="card-img-top img-fluid" src="{{ asset('/img/guide_card.png') }}">
            <div class="card-body">
                <h5 class="card-title">Guides</h5>
                <p class="card-text">Create, delete or edit the guides of the database</p>
                <a href="#" class="btn btn-primary">Manage Guides</a>
            </div>
        </div>
    </div>

</div>

@endsection