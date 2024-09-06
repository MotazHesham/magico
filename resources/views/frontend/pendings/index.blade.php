@extends('layouts.frontend')
@section('content')

@include('frontend.orders.partials.orders',['title' => trans('cruds.pending.title')]);

@endsection

@section('scripts')
    @parent
    @include('frontend.orders.partials.scripts',['route' => route('frontend.pendings.index'),'permission_name' => 'to_overview' , 'stage' => 'overview']);
@endsection
