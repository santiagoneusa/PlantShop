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
                <h5 class="card-title">{{ __('app.colon_formatted_user_name', ['id' => $viewData['user']->getName()]) }}</h5>
                <p class="card-text">{{ __('app.colon_formatted_user_balance', ['balance' => $viewData['user']->getBalance()]) }}</p>
                <p class="card-text">{{ __('app.colon_formatted_user_email', ['email' => $viewData['user']->getEmail()]) }}</p>
                <p class="card-text">{{ __('app.colon_formatted_user_since', ['date' => $viewData['user']->getCreatedAt()]) }}</p>
            </div>
        </div>
    </div>
</div>

<div>
    <h1>Descargar Reporte de Órdenes</h1>
    <div>
        <a href="{{ route('user.reports', ['fileType' => 'xlsx']) }}" download>
            <button>Descargar Reporte XLSX</button>
        </a>
        <a href="{{ route('user.reports', ['fileType' => 'json']) }}" download>
            <button>Descargar Reporte JSON</button>
        </a>
    </div>
</div>
    
@forelse ($viewData["orders"] as $order)
<div class="card mb-4">
    <div class="card-header">{{ __('app.hash_formatted_order_id', ['id' => $order->getId()]) }}</div>
    <div class="card-body">
        {{ __('app.colon_formatted_order_date', ['date' => $order->getCreatedAt()]) }}<br />
        {{ __('app.colon_formatted_order_total', ['total' => $order->getTotal()]) }}<br />
    </div>
    <table class="table table-bordered table-striped text-center mt-3">
        <thead>
            <tr>
                <th scope="col">{{ __('app.table_header_product_item_id') }}</th>
                <th scope="col">{{ __('app.table_header_product_name') }}</th>
                <th scope="col">{{ __('app.table_header_product_price') }}</th>
                <th scope="col">{{ __('app.table_header_product_quantity') }}</th>
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
<div class="alert alert-danger" role="alert">{{ __('app.not_purchase') }}</div>
@endforelse

@endsection