<!-- Made by: Santiago Neusa Ruiz -->

@extends('layouts.app')
@section('title', $viewData["subtitle"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-2">
    <div class="row g-0">
        <div class="col-md-3">
            <img src="{{ asset('/storage/'.$viewData['user']->getImage()) }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $viewData['user']->getName() }}</h5>
                <p class="card-text">Balance: ${{ $viewData['user']->getBalance() }}</p>
                <p class="card-text">Email: {{ $viewData['user']->getEmail() }}</p>
                <p class="card-text">Since: {{ $viewData['user']->getCreatedAt() }}</p>
            </div>
        </div>
    </div>
</div>
    
@forelse ($viewData["orders"] as $order)
<div class="card mb-4">
    <div class="card-header">
        Order #{{ $order->getId() }}
    </div>
    <div class="card-body">
        <b>Date:</b> {{ $order->getCreatedAt() }}<br />
        <b>Total:</b> ${{ $order->getTotal() }}<br />
    </div>
    <table class="table table-bordered table-striped text-center mt-3">
        <thead>
            <tr>
                <th scope="col">Item ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->getItems() as $item)
            <tr>
                <td>{{ $item->getId() }}</td>
                <td>
                    <a class="link-success" href="{{ route('plant.show', ['id'=> $item->getPlant()->getId()]) }}">
                        {{ $item->getPlant()->getName() }}
                    </a>
                </td>
                <td>${{ $item->getPrice() }}</td>
                <td>{{ $item->getQuantity() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@empty
<div class="alert alert-danger" role="alert">
    Seems to be that you have not purchased anything in our store.
</div>
@endforelse

@endsection