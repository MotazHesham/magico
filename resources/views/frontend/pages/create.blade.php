@extends('layouts.frontend')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.page.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('frontend.pages.store') }}" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label class="required" for="page_name">{{ trans('cruds.page.fields.page_name') }}</label>
                    <input class="form-control {{ $errors->has('page_name') ? 'is-invalid' : '' }}" type="text"
                        name="page_name" id="page_name" value="{{ old('page_name', '') }}" required>
                    @if ($errors->has('page_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('page_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.page.fields.page_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="page_link">{{ trans('cruds.page.fields.page_link') }}</label>
                    <input class="form-control {{ $errors->has('page_link') ? 'is-invalid' : '' }}" type="text"
                        name="page_link" id="page_link" value="{{ old('page_link', '') }}" required>
                    @if ($errors->has('page_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('page_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.page.fields.page_link_helper') }}</span>
                </div> 
                <div class="form-group">
                    <label for="logo">{{ trans('cruds.page.fields.logo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                    </div>
                    @if ($errors->has('logo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('logo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.page.fields.logo_helper') }}</span>
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
        Dropzone.options.logoDropzone = {
            url: '{{ route('frontend.pages.storeMedia') }}',
            maxFilesize: 4, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 4,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($page) && $page->logo)
                    var file = {!! json_encode($page->logo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
