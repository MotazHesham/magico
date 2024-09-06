@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.messageGeneration.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.message-generations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.messageGeneration.fields.id') }}
                        </th>
                        <td>
                            {{ $messageGeneration->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageGeneration.fields.full_message') }}
                        </th>
                        <td>
                            {{ $messageGeneration->full_message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageGeneration.fields.response') }}
                        </th>
                        <td>
                            {{ $messageGeneration->response }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageGeneration.fields.tokens') }}
                        </th>
                        <td>
                            {{ $messageGeneration->tokens }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageGeneration.fields.shift') }}
                        </th>
                        <td>
                            {{ $messageGeneration->shift->id ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.messageGeneration.fields.order') }}
                        </th>
                        <td>
                            {{ $messageGeneration->order->id ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.message-generations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection