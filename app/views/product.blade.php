@extends('template')

@section('content')

	<h3>Personalize Yours:</h3>

	@foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach

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
			<input type="text" name="quantity">
		</p>

		<!-- UPLOADIFY HERE -->
		<input type="file" name="file_upload" id="file_upload" />

		<div id="some_file_queue"></div>

		<div id="photos"></div>

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
			<input type="text" name="fname" placeholder="First Name">
		</p>
		<p>
			<label>Last Name * </label>
			<input type="text" name="lname" placeholder="Last Name">
		</p>
		<p>
			<label>Company Name </label>
			<input type="text" name="company_name" placeholder="Company Name">
		</p>
		<p>
			<label>Email * </label>
			<input type="text" name="email" placeholder="Email Address">
		</p>
		<p>
			<label>Confirm Email * </label>
			<input type="text" name="confirm_email" placeholder="Email Address">
		</p>
		<p>
			<label>Street / No. * </label>
			<input type="text" name="street_no" placeholder="Street / No.">
		</p>
		<p>
			<label>Address Line 2 </label>
			<input type="text" name="address" placeholder="Address">
		</p>
		<p>
			<label>Postal / Zip Code * </label>
			<input type="text" name="postal" placeholder="Postal / Zip Code">
		</p>
		<p>
			<label>Town / City * </label>
			<input type="text" name="city" placeholder="Town / City ">
		</p>
		<p>
			<label>Province / State * </label>
			<select name="province">
				@foreach($state_arr as $key => $value)
					<option value="{{$key}}">{{$value}}</option>
				@endforeach
			</select>
		</p>
		<p>
			<label>Telephone * </label>
			<input type="text" name="telephone1" placeholder="000">
			<input type="text" name="telephone2" placeholder="000">
			<input type="text" name="telephone3" placeholder="0000">
		</p>

		<h4 class="item_option">Pickup / Delivery</h4>
		<p><input type="radio" value="I will pickup my order when it is ready (pickup at 800 Talbot Street, St. Thomas, ON)" name="pickup_delivery"> I will pickup my order when it is ready (pickup at 800 Talbot Street, St. Thomas, ON)</input></p>
		<p><input type="radio" value="Ship to address above (extra charges may apply)" name="pickup_delivery"> Ship to address above (extra charges may apply)</input></p>
		<p><input type="radio" value="Enter a separate shipping address (extra charges may apply)" name="pickup_delivery"> Enter a separate shipping address (extra charges may apply)</input></p>

		<input type="hidden" name="product_name" value="{{$product->name}}">

		<button type="submit">Submit</button>

	</form>

	<script type="text/javascript">
		$(function() {
			var time = new Date().getTime();
		    $('#file_upload').uploadify({
		    	'queueID'  : 'some_file_queue',
		    	'removeCompleted'	: true,
		        'swf'      : '{{ URL::asset('uploadify.swf') }}',
		        'uploader' : '{{ URL::asset('uploadify.php') }}',
		        'formData' : { 'time' : time },
		        'onUploadComplete' : function(file) {
		            $('#photos').append('<input type="hidden" name="photos[]" value="'+time+'_'+file.name+'">');
		        }
		    });
		});
	</script>
@stop







