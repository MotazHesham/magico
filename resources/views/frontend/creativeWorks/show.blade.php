@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.creativeWork.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.creative-works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.creativeWork.fields.id') }}
                        </th>
                        <td>
                            {{ $creativeWork->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.creativeWork.fields.image') }}
                        </th>
                        <td>
                            @if($creativeWork->image)
                                <a href="{{ $creativeWork->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $creativeWork->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.creativeWork.fields.title_1') }}
                        </th>
                        <td>
                            {{ $creativeWork->title_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.creativeWork.fields.title_2') }}
                        </th>
                        <td>
                            {{ $creativeWork->title_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('frontend.creative-works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection