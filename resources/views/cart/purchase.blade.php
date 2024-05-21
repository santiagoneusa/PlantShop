@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
    <div class="card-header">{{ __('app.purchase_completed') }}</div>
    <div class="card-body">
        <div class="alert alert-success" role="alert">{{ __('app.purchase_completed_message') }}<b>{{ $viewData["order"]->getId() }}</b></div>
    </div>
</div>
@endsection