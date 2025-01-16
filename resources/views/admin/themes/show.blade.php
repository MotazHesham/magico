@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.theme.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.themes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.theme.fields.id') }}
                        </th>
                        <td>
                            {{ $theme->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.theme.fields.name') }}
                        </th>
                        <td>
                            {{ $theme->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.theme.fields.info') }}
                        </th>
                        <td>
                            {{ $theme->info }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.theme.fields.photo') }}
                        </th>
                        <td>
                            @foreach($theme->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.themes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection