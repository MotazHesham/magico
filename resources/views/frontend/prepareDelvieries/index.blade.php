
@extends('layouts.frontend')
@section('content')

@include('frontend.orders.partials.orders',['title' => trans('cruds.prepareDelviery.title')]);

@endsection

@section('scripts')
    @parent 
    @include('frontend.orders.partials.scripts',['route' => route('frontend.prepare-delvieries.index'),'permission_name' => 'to_on_delivery', 'stage' => 'on_delivery']);
@endsection
