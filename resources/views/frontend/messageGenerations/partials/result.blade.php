
<link href="{{ customAsset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div style="display: flex;justify-content: space-between"> 
            <span class="badge badge-info">Used tokens : {{ $response['usage']['total_tokens'] }}</span>
            <span class="badge badge-warning">Remaining tokens : {{ tenant('tokens') ? number_format(tenant('tokens')) : 0 }}</span>
        </div>
    </div>
    @php
        $checked = '<i class="fas fa-check-circle" style="color:green"></i>';
        $info = '<i class="fas fa-info-circle" style="color:red"></i>'; 
    @endphp
    <div class="card-body">
        <form method="POST" action="{{ route('frontend.storeOrder') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="full_message" id="" value="{{ $full_message }}">
            <input type="hidden" name="shift_id" value="{{ $shift_id }}">
            <input type="hidden" name="message_generation_id" value="{{ $messageGenerationId }}">
            
            <div class="row"> 
                <div class="form-group col-md-4">
                    <label for="name">{{ trans('cruds.order.fields.name') }}  </label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $response['order']->customer_name) }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone_number">{{ trans('cruds.order.fields.phone_number') }}</label>
                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $response['order']->customer_phones->phone) }}">
                    @if($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.phone_number_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone_number_2">{{ trans('cruds.order.fields.phone_number_2') }}</label>
                    <input class="form-control {{ $errors->has('phone_number_2') ? 'is-invalid' : '' }}" type="text" name="phone_number_2" id="phone_number_2" value="{{ old('phone_number_2', $response['order']->customer_phones->another_phone) }}">
                    @if($errors->has('phone_number_2'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number_2') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.phone_number_2_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="country_id">{{ trans('cruds.order.fields.country') }} @if($country) {!! $checked !!} @else {!! $info !!} @endif</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required>
                        @foreach($countries as $id => $entry)
                            <option value="{{ $id }}" {{ old('country_id',$country ? $country->id  : 0) == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('country'))
                        <div class="invalid-feedback">
                            {{ $errors->first('country') }}
                        </div>
                    @endif
                    <span class="help-block">@if(!$country) لم يتم العثور علي  <b>{{ $response['order']->customer_address->country }}</b> @endif</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="city_id">{{ trans('cruds.order.fields.city') }} @if($city) {!! $checked !!} @else {!! $info !!} @endif</label>
                    <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                        @foreach($cities as $id => $entry)
                            <option value="{{ $id }}" {{ old('city_id',$city ? $city->id : 0) == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('city'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                    <span class="help-block">@if(!$city) لم يتم العثور علي  <b>{{ $response['order']->customer_address->city }}</b> @endif</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone_number_2">{{ trans('cruds.order.fields.district') }}</label>
                    <input class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" id="district" value="{{ old('district', $response['order']->customer_address->district) }}">
                    @if($errors->has('district'))
                        <div class="invalid-feedback">
                            {{ $errors->first('district') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.district_helper') }}</span>
                </div>
                <div class="form-group col-md-12">
                    <label for="shipping_address">{{ trans('cruds.order.fields.shipping_address') }}</label>
                    <textarea class="form-control {{ $errors->has('shipping_address') ? 'is-invalid' : '' }}" name="shipping_address" id="shipping_address">{{ old('shipping_address',$response['order']->customer_address->full_address) }}</textarea>
                    @if($errors->has('shipping_address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('shipping_address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.shipping_address_helper') }}</span>
                </div>
                <table class="col-md-12 table table-bordered table-striped table-hover datatable ">
                    <thead>
                        <th>
                            {{ trans('cruds.orderDetail.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.colors') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.size') }}
                        </th>
                        <th>
                            
                        </th>
                    </thead>
                    <tbody>
                        @foreach($response['order']->products as $key => $product) 
                            <tr>
                                <td>   
                                    <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="products[{{$key}}][product_id]" required>
                                        @foreach($products as $id => $entry)
                                            <option value="{{ $id }}" {{ old('product_id',$product->product_id) == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select> 
                                    <label> @if($product->product_id) {!! $checked !!} @else {!! $info !!} @endif</label>
                                    <span class="help-block">@if(!$product->product_id) لم يتم العثور علي  <b>{{ $product->product_name }}</b> @endif</span> 
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="products[{{$key}}][quantity]" value="{{ count($product->product_colors) ?? 1 }}">
                                </td>
                                <td> 
                                    <input  type="text" class="form-control {{ $errors->has('colors') ? 'is-invalid' : '' }}" name="products[{{$key}}][colors][]" placeholder="add colors ..." value="{{ implode(',',$product->product_colors) }}" data-role="tagsinput">
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="products[{{$key}}][size]" value="{{ $product->product_size }}" id="">
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-danger delete-row" type="button">{{ trans('global.delete') }}</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <label class="col-md-2">
                    {{ trans('cruds.order.fields.total_cost') }}
                </label>
                <div class="col-md-4">
                    <input type="number" class="form-control" value="{{ $response['order']->total }}" name="total_cost">
                </div>
            </div>

            <div class="form-group mt-4">
                <button class="btn btn-success btn-lg" type="submit">
                    أضافة الطلب
                </button>
            </div>
        </form>
    </div>
</div> 
<script src="{{ customAsset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script> 
    $('.select2').select2({
        dropdownParent: $('#processed_message')
    }); 

    $(document).on('click', '.delete-row', function() {
        $(this).closest('tr').remove(); // Removes the closest <tr> when delete button is clicked

    });

    $(document).ready(function() {
        convertPhones(); 
    });
    
    function convertPhones(){

        var inputValue = $('#phone_number').val();
        var englishValue = convertDigitsToEnglish(inputValue);
        $('#phone_number').val(englishValue);

        var inputValue2 = $('#phone_number_2').val();
        var englishValue2 = convertDigitsToEnglish(inputValue2);
        $('#phone_number_2').val(englishValue2);
    }
    
    function convertDigitsToEnglish(input) {
        var arabicDigits = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
        var englishDigits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

        for (var i = 0; i < arabicDigits.length; i++) {
            var regex = new RegExp(arabicDigits[i], "g");
            input = input.replace(regex, englishDigits[i]);
        }

        return input;
    }

</script>