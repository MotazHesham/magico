
@extends('layouts.frontend')
@section('content')

@include('frontend.orders.partials.orders',['title' => trans('cruds.onDelivery.title')]);

@endsection

@section('scripts')
    @parent 
    @include('frontend.orders.partials.scripts',['route' => route('frontend.on-deliveries.index'),'permission_name' => 'to_delivered', 'stage' => 'delivered']);
@endsection
