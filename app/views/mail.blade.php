<h1>{{$product}}</h1>

<?php $details = json_decode($details, true) ?>
@if(is_array($details))
	<p>Order Details:</p>
	@foreach($details as $key => $value)
		{{str_replace('_', ' ', $key).' : '.$value}}
	@endforeach
@else
<p>Order Details: {{$details}}</p>
@endif

<br />

<p>User information:</p>

<p>Name: {{$fname.' '.$lname}}</p>
<p>Company: {{$company_name}}</p>
<p>Email: {{$email}}</p>
<p>Address: {{$street_no}}</p>
<p>Second Address: {{$address}}</p>
<p>Postal Code / ZIP: {{$postal}}</p>
<p>City: {{$city}}</p>
<p>Province: {{$province}}</p>
<p>Telephone: {{$telephone}}</p>

<br />

<p>Quantity: {{$quantity}}</p>
<p>Pickup Method: {{$pickup_delivery}}</p>

@if(is_array($photos))
	<p>Photos:</p>
	@foreach($photos as $p)
		{{$p}}
	@endforeach
@else
<p>Photos: {{$photos}}</p>
@endif