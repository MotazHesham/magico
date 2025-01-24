@extends('layouts.frontend')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.slider.title_singular') }}
    </div>

    <div class="card-body"> 

        <form method="POST" action="{{ route("frontend.sliders.update", [$slider->id]) }}" enctype="multipart/form-data"> 
            @method('PUT')
            @csrf
            
            @include('partials.langSwitcher')

            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.slider.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="headline_1">{{ trans('cruds.slider.fields.headline_1') }} <i class="fas fa-language" style="color:green"></i> </label>
                <input class="form-control {{ $errors->has('headline_1') ? 'is-invalid' : '' }}" type="text" name="headline_1" id="headline_1" value="{{ old('headline_1', $slider->getTranslation('headline_1',currentEditingLang())) }}">
                @if($errors->has('headline_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('headline_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.headline_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="headline_2">{{ trans('cruds.slider.fields.headline_2') }} <i class="fas fa-language" style="color:green"></i></label>
                <input class="form-control {{ $errors->has('headline_2') ? 'is-invalid' : '' }}" type="text" name="headline_2" id="headline_2" value="{{ old('headline_2', $slider->getTranslation('headline_2',currentEditingLang())) }}">
                @if($errors->has('headline_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('headline_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.headline_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.slider.fields.description') }} <i class="fas fa-language" style="color:green"></i></label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $slider->getTranslation('description',currentEditingLang())) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $slider->active || old('active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.slider.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_name">{{ trans('cruds.slider.fields.button_name') }} <i class="fas fa-language" style="color:green"></i></label>
                <input class="form-control {{ $errors->has('button_name') ? 'is-invalid' : '' }}" type="text" name="button_name" id="button_name" value="{{ old('button_name', $slider->getTranslation('button_name',currentEditingLang())) }}">
                @if($errors->has('button_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.button_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.slider.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $slider->link) }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slider.fields.link_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('frontend.sliders.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($slider) && $slider->image)
      var file = {!! json_encode($slider->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection