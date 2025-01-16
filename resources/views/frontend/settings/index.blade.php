@extends('layouts.frontend')
@section('content')

    @if(tenant('theme_id') == 1)
        @include('frontend.settings.ctotek')
    @else 
        <h4>Comming soon</h4>
    @endif

@endsection

@section('scripts')
    <script>
        $('#add-more').on('click', function() {
            const container = $('#dynamic-links-container');
            const rows = container.find('.link-row');

            // Get the last row's index and increment it for the new row
            const newIndex = rows.length > 0 ? parseInt(rows.last().find('input').attr('name').match(/\[(\d+)\]/)[
                1]) + 1 : 0;

            const firstRow = rows.first();
            if (firstRow.length) {
                const newRow = firstRow.clone();

                // Update the name attributes in the cloned row
                newRow.find('input').each(function() {
                    const name = $(this).attr('name').replace(/\[\d+\]/, `[${newIndex}]`);
                    $(this).attr('name', name);
                });

                // Clear the input values in the cloned row
                newRow.find('input').val('');

                // Append the new row to the container
                container.append(newRow);
            }
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('.link-row').remove();
        });
    </script>
    <script>
        Dropzone.options.contactusimageDropzone = {
            url: '{{ route('frontend.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_14 form').find('input[name="contactusimage"]').remove()
                $('#setting_14 form').append('<input type="hidden" name="contactusimage" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_14 form').find('input[name="contactusimage"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('contactusimage'))
                    var external_link = "{!! settingAsset(get_setting('contactusimage')) !!}"
                    var mockFile = {
                        name: "contactusimage",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_14 form').append('<input type="hidden" name="contactusimage" value="' + mockFile.file_name +
                        '">')
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
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('frontend.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="logo"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('logo'))
                    var external_link = "{!! settingAsset(get_setting('logo')) !!}"
                    var mockFile = {
                        name: "logo",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="logo" value="' + mockFile.file_name +
                        '">')
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
    <script>
        Dropzone.options.iconDropzone = {
            url: '{{ route('frontend.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.ico',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="icon"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="icon" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="icon"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('icon'))
                    var external_link = "{!! settingAsset(get_setting('icon')) !!}"
                    var mockFile = {
                        name: "icon",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="icon" value="' + mockFile.file_name +
                        '">')
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
    <script>
        Dropzone.options.aboutusimage1Dropzone = {
            url: '{{ route('frontend.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_7 form').find('input[name="about_us_image_1"]').remove()
                $('#setting_7 form').append('<input type="hidden" name="about_us_image_1" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_7 form').find('input[name="about_us_image_1"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('about_us_image_1'))
                    var external_link = "{!! settingAsset(get_setting('about_us_image_1')) !!}"
                    var mockFile = {
                        name: "about_us_image_1",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_7 form').append('<input type="hidden" name="about_us_image_1" value="' + mockFile.file_name +
                        '">')
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
    <script>
        Dropzone.options.aboutusimage2Dropzone = {
            url: '{{ route('frontend.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_7 form').find('input[name="about_us_image_2"]').remove()
                $('#setting_7 form').append('<input type="hidden" name="about_us_image_2" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_7 form').find('input[name="about_us_image_2"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('about_us_image_2'))
                    var external_link = "{!! settingAsset(get_setting('about_us_image_2')) !!}"
                    var mockFile = {
                        name: "about_us_image_2",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_7 form').append('<input type="hidden" name="about_us_image_2" value="' + mockFile.file_name +
                        '">')
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
    <script>
        Dropzone.options.metaimageDropzone = {
            url: '{{ route('frontend.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_4 form').find('input[name="metaimage"]').remove()
                $('#setting_4 form').append('<input type="hidden" name="metaimage" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_4 form').find('input[name="metaimage"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('metaimage'))
                    var external_link = "{!! settingAsset(get_setting('metaimage')) !!}"
                    var mockFile = {
                        name: "Meta Image",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_4 form').append('<input type="hidden" name="metaimage" value="' + mockFile
                        .file_name + '">')
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
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('frontend.settings.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '0');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>
@endsection
