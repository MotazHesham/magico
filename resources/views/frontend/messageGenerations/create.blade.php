@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.messageGeneration.title_singular') }}
                </div>

                <div class="card-body">
                    <form id="messageForm" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="shift_id" value="{{ $shift->id }}" id="">
                        
                        <div class="form-group">
                            <label class="required"
                                for="full_message">{{ trans('cruds.order.fields.full_message') }}</label>
                            <textarea class="form-control {{ $errors->has('full_message') ? 'is-invalid' : '' }}" name="full_message"
                                id="full_message" required>{{ old('full_message') }}</textarea>
                            @if ($errors->has('full_message'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('full_message') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.full_message_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-warning btn-lg" id="submitBtn" type="submit">
                                Generate Order
                            </button>
                            <div id="spinner"  style="display: none">
                                <div class="spinner-border text-light" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6" id="processed_message">

        </div>
    </div> 
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#messageForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
    
                var btn = $('#submitBtn');
                var originalContent = btn.html();
                btn.html($('#spinner').html());
                btn.prop('disabled', true); 

                var formData = new FormData(this); // Create form data object
                $.ajax({
                    url: "{{ route('frontend.message_ai') }}", // Your form action route
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) { 
                        $('#processed_message').html(response);
                        btn.html(originalContent);
                        btn.prop('disabled', false);
                    },
                    error: function(error) { 
                        console.log(error);
                        showAlert('error','Couldnt generate', error.responseJSON.error);
                        btn.html(originalContent);
                        btn.prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
