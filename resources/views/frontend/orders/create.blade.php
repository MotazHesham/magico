@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="full_massage">{{ trans('cruds.order.fields.full_massage') }}</label>
                            <textarea class="form-control" name="full_massage" id="full_massage" required>{{ old('full_massage') }}</textarea>
                            @if($errors->has('full_massage'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('full_massage') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.full_massage_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="tokens">{{ trans('cruds.order.fields.tokens') }}</label>
                            <input class="form-control" type="number" name="tokens" id="tokens" value="{{ old('tokens', '') }}" step="1" required>
                            @if($errors->has('tokens'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tokens') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.tokens_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.order.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">{{ trans('cruds.order.fields.phone_number') }}</label>
                            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}">
                            @if($errors->has('phone_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.phone_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_number_2">{{ trans('cruds.order.fields.phone_number_2') }}</label>
                            <input class="form-control" type="text" name="phone_number_2" id="phone_number_2" value="{{ old('phone_number_2', '') }}">
                            @if($errors->has('phone_number_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.phone_number_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="shipping_address">{{ trans('cruds.order.fields.shipping_address') }}</label>
                            <textarea class="form-control" name="shipping_address" id="shipping_address">{{ old('shipping_address') }}</textarea>
                            @if($errors->has('shipping_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('shipping_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.shipping_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="shift_id">{{ trans('cruds.order.fields.shift') }}</label>
                            <select class="form-control select2" name="shift_id" id="shift_id">
                                @foreach($shifts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('shift_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('shift'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('shift') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.shift_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="country_id">{{ trans('cruds.order.fields.country') }}</label>
                            <select class="form-control select2" name="country_id" id="country_id">
                                @foreach($countries as $id => $entry)
                                    <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="city_id">{{ trans('cruds.order.fields.city') }}</label>
                            <select class="form-control select2" name="city_id" id="city_id">
                                @foreach($cities as $id => $entry)
                                    <option value="{{ $id }}" {{ old('city_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection