@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("frontend.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="page_id">{{ trans('cruds.product.fields.page') }}</label>
                <select class="form-control select2 {{ $errors->has('page') ? 'is-invalid' : '' }}" name="page_id" id="page_id" required>
                    @foreach($pages as $id => $entry)
                        <option value="{{ $id }}" {{ (old('page_id') ? old('page_id') : $product->page->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('page'))
                    <div class="invalid-feedback">
                        {{ $errors->first('page') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.page_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.product.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.product.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="colors">{{ trans('cruds.product.fields.colors') }}</label> 
                <input type="text" class="form-control {{ $errors->has('colors') ? 'is-invalid' : '' }}" name="colors[]" value="{{ $product->colors }}" placeholder="add colors ..." data-role="tagsinput">
                @if($errors->has('colors'))
                    <div class="invalid-feedback">
                        {{ $errors->first('colors') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.colors_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sizes">{{ trans('cruds.product.fields.sizes') }}</label>
                <input type="text" class="form-control {{ $errors->has('sizes') ? 'is-invalid' : '' }}" name="sizes[]" value="{{ $product->sizes }}" placeholder="add sizes ..." data-role="tagsinput"> 
                @if($errors->has('sizes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sizes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.sizes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="predictions">{{ trans('cruds.product.fields.predictions') }}</label> 
                <input type="text" class="form-control {{ $errors->has('predictions') ? 'is-invalid' : '' }}" name="predictions[]" value="{{ $product->predictions }}" placeholder="add predictions ..." data-role="tagsinput">
                @if($errors->has('predictions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('predictions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.predictions_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection