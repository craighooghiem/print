@extends('template')

@section('content')

	<h3>Personalize Yours:</h3>

	<p class="errors">
		@foreach($errors->all() as $error)
	        {{$error}}<br />
	    @endforeach
	</p>

	<form method="POST" enctype="multipart/form-data" action="{{URL::to('product/'.$product->id.'/post')}}">
		@foreach($product->options as $o)
			<h4 class="item_option">{{$o->name}}</h4>

			@if($o->input_type == 'radio')
				@foreach($o->details as $d)
				<p>
					@if($d->picture != NULL)
						<img src="{{asset('/uploads/item_details/'.$d->picture)}}">
					@endif
					<input type="radio" value="{{$d->name}}" name="details[{{str_replace(' ', '_', $o->name)}}]"> {{$d->name}}</input>
				</p>
				@endforeach
			@elseif($o->input_type == 'select')
				<select name="details[{{str_replace(' ', '_', $o->name)}}]">
					@foreach($o->details as $d)
						<option>{{$d->name}}</option>
					@endforeach
				</select>
			@endif

		@endforeach

		<p>
			<h4 class="item_option">Quantity: </h4>
			<input type="text" name="quantity" value="{{ Input::old('quantity') }}">
		</p>

		<!-- UPLOADIFY HERE -->
		<input type="file" name="file_upload" id="file_upload" />

		<div id="some_file_queue">
			@if(Input::old('photos'))
				@foreach(Input::old('photos') as $index => $photo)
					<div class="uploadify-queue-item">
						{{ $photo }}
					</div>
				@endforeach
			@endif
		</div>

		<div id="photos">
			@if(Input::old('photos'))
				@foreach(Input::old('photos') as $index => $photo)
					<input type="hidden" value="{{ $photo }}" name="photos[]" />
				@endforeach
			@endif
		</div>

		<h4 class="item_option">Please fill in all fields marked (*)</h4>
		<p>
			<label>Salutation * </label>
			<select name="salutation">
				<option value="mr">Mr</option>
				<option value="mrs">Mrs.</option>
				<option value="miss">Ms.</option>
			</select>
		</p>
		<p>
			<label>First Name * </label>
			<input type="text" name="fname" placeholder="First Name" value="{{ Input::old('fname') }}">
		</p>
		<p>
			<label>Last Name * </label>
			<input type="text" name="lname" placeholder="Last Name" value="{{ Input::old('lname') }}">
		</p>
		<p>
			<label>Company Name </label>
			<input type="text" name="company_name" placeholder="Company Name" value="{{ Input::old('company_name') }}">
		</p>
		<p>
			<label>Email * </label>
			<input type="text" name="email" placeholder="Email Address" value="{{ Input::old('email') }}">
		</p>
		<p>
			<label>Confirm Email * </label>
			<input type="text" name="confirm_email" placeholder="Email Address" value="{{ Input::old('confirm_email') }}">
		</p>
		<p>
			<label>Street / No. * </label>
			<input type="text" name="street_no" placeholder="Street / No." value="{{ Input::old('street_no') }}">
		</p>
		<p>
			<label>Address Line 2 </label>
			<input type="text" name="address" placeholder="Address" value="{{ Input::old('address') }}">
		</p>
		<p>
			<label>Postal / Zip Code * </label>
			<input type="text" name="postal" placeholder="Postal / Zip Code" value="{{ Input::old('postal') }}">
		</p>
		<p>
			<label>Town / City * </label>
			<input type="text" name="city" placeholder="Town / City " value="{{ Input::old('city') }}">
		</p>
		<p>
			<label>Province / State * </label>
			<select name="province">
				@foreach($state_arr as $key => $value)
					@if(Input::old('province') && Input::old('province') == $key)
						<option selected="selected" value="{{$key}}">{{$value}}</option>
					@else
						<option value="{{$key}}">{{$value}}</option>
					@endif
				@endforeach
			</select>
		</p>
		<p>
			<label>Telephone * </label>
			<input type="text" name="telephone1" value="{{ Input::old('telephone1') }}" placeholder="000">
			<input type="text" name="telephone2" value="{{ Input::old('telephone2') }}" placeholder="000">
			<input type="text" name="telephone3" value="{{ Input::old('telephone3') }}" placeholder="0000">
		</p>

		<h4 class="item_option">Pickup / Delivery</h4>
		<p>
			@if(Input::old('pickup_delivery') && Input::old('pickup_delivery') == 'I will pickup my order when it is ready (pickup at 800 Talbot Street, St. Thomas, ON)')
				<input type="radio" class="shipping" checked="checked" value="I will pickup my order when it is ready (pickup at 800 Talbot Street, St. Thomas, ON)" name="pickup_delivery" /> 
			@else
				<input type="radio" class="shipping" value="I will pickup my order when it is ready (pickup at 800 Talbot Street, St. Thomas, ON)" name="pickup_delivery" /> 
			@endif
			I will pickup my order when it is ready (pickup at 800 Talbot Street, St. Thomas, ON)
		</p>
		<p>
			@if(Input::old('pickup_delivery') && Input::old('pickup_delivery') == 'Ship to address above (extra charges may apply)')
				<input type="radio" class="shipping" checked="checked" value="Ship to address above (extra charges may apply)" name="pickup_delivery">
			@else
				<input type="radio" class="shipping" value="Ship to address above (extra charges may apply)" name="pickup_delivery">
			@endif
			Ship to address above (extra charges may apply)
		</p>
		<p>
			@if(Input::old('pickup_delivery') && Input::old('pickup_delivery') == 'Enter a separate shipping address (extra charges may apply)')
				<input type="radio" class="shipping" id="shipping_add" checked="checked" value="Enter a separate shipping address (extra charges may apply)" name="pickup_delivery">
			@else
				<input type="radio" class="shipping" id="shipping_add" value="Enter a separate shipping address (extra charges may apply)" name="pickup_delivery">
			@endif
			Enter a separate shipping address (extra charges may apply)
		</p>

		<div id="address2" style="display:none;">
			<h3>Enter Your Shipping Address</h3>
			<p>
				<label>Street / No. * </label>
				<input type="text" name="street_no2" placeholder="Street / No." value="{{ Input::old('street_no') }}">
			</p>
			<p>
				<label>Address Line 2 </label>
				<input type="text" name="address2" placeholder="Address" value="{{ Input::old('address') }}">
			</p>
			<p>
				<label>Postal / Zip Code * </label>
				<input type="text" name="postal2" placeholder="Postal / Zip Code" value="{{ Input::old('postal') }}">
			</p>
			<p>
				<label>Town / City * </label>
				<input type="text" name="city2" placeholder="Town / City " value="{{ Input::old('city') }}">
			</p>
			<p>
				<label>Province / State * </label>
				<select name="province2">
					@foreach($state_arr as $key => $value)
						@if(Input::old('province') && Input::old('province') == $key)
							<option selected="selected" value="{{$key}}">{{$value}}</option>
						@else
							<option value="{{$key}}">{{$value}}</option>
						@endif
					@endforeach
				</select>
			</p>
		</div>

		<input type="hidden" name="product_name" value="{{$product->name}}">

		<button type="submit">Submit</button>

	</form>

	<script type="text/javascript">
		$(function() {
			var time = new Date().getTime();
		    $('#file_upload').uploadify({
		    	'queueID'  : 'some_file_queue',
		    	'removeCompleted'	: false,
		        'swf'      : '{{ URL::asset('uploadify.swf') }}',
		        'uploader' : '{{ URL::asset('uploadify.php') }}',
		        'formData' : { 'time' : time },
		        'onUploadComplete' : function(file) {
		            $('#photos').append('<input type="hidden" name="photos[]" value="'+time+'_'+file.name+'">');
		        }
		    });

		    $('.shipping').on('click', function(){
		    	if($('#shipping_add').is(':checked' ) )
		    	{
		    		$('#address2').css('display', 'block');
		    	}
		    	else
		    	{
		    		$('#address2').css('display', 'none');
		    	}
		    });
		});
	</script>
@stop







