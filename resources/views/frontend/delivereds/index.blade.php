
@extends('layouts.frontend')
@section('content')

@include('frontend.orders.partials.orders',['title' => trans('cruds.delivered.title')]);

@endsection

@section('scripts')
    @parent
    @include('frontend.orders.partials.scripts',['route' => route('frontend.delivereds.index'),'permission_name' => false,'stage' => false]);
@endsection
