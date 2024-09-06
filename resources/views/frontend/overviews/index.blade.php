
@extends('layouts.frontend')
@section('content')

@include('frontend.orders.partials.orders',['title' => trans('cruds.overview.title')]);

@endsection

@section('scripts')
    @parent 
    @include('frontend.orders.partials.scripts',['route' => route('frontend.overviews.index'), 'permission_name' => 'to_prepare_for_delivery' , 'stage' => 'prepare_delviery']);
@endsection
