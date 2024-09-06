
@extends('layouts.frontend')
@section('content')

@include('frontend.orders.partials.orders',['title' => trans('cruds.canceled.title')]);

@endsection

@section('scripts')
    @parent
    @include('frontend.orders.partials.scripts',['route' => route('frontend.canceleds.index'),'permission_name' => false, 'stage' => false]);
@endsection
