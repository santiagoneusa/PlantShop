@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div >
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
            <div class="d-flex justify-content-between align-items-center">
                <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
                @if ($viewData['notEnoughBalance'])
                <a class="btn btn-outline-secondary mb-2"><b>Not enough balance</b></a>
                <a href="{{ route('cart.delete') }}" class="btn bg-danger text-white mb-2">Remove all plants from Cart</a>
                @else
                    @if (count($viewData["plants"]) > 0)
                    <form action="{{ route('cart.purchase') }}" class="d-flex" role="search">
                        <input name="address" class="form-control me-2" type="search" placeholder="Address">
                        <button type="submit" class="btn bg-primary text-white">Purchase</button>
                    </form>
                    <a href="{{ route('cart.delete') }}" class="btn bg-danger text-white mb-2">Remove all plants from Cart</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection