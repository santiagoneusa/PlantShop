@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
    <div class="card-header">
        Plants in Cart
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["plants"] as $plant)
                <tr>
                    <td>{{ $plant->getId() }}</td>
                    <td>{{ $plant->getName() }}</td>
                    <td>${{ $plant->getPrice() }}</td>
                    <td>{{ session('plants')[$plant->getId()] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
                @if (count($viewData["plants"]) > 0)
                <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a>
                <a href="{{ route('cart.delete') }}">
                    <button class="btn btn-danger mb-2">
                        Remove all plants from Cart
                    </button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection