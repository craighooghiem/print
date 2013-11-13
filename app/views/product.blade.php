@extends('template')

@section('content')
	<h2>{{$product->name}}</h2>

	<h4>Personalize Yours</h4>
	<form method="POST">
		@foreach($product->options as $o)
			<h5 class="item_option">{{$o->name}}</h5>

			@foreach($o->details as $d)
				<input type="radio" value="$d->name" name="$o->name">{{$d->name}}</input>
			@endforeach
		@endforeach

		<p>
			<label class="item_option">Quantity: </label><br />
			<input type="text" name="quantity">
		</p>
	</form>
@stop