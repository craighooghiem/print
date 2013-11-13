@extends('template')

@section('content')
	@foreach($items as $i)
		<p><a href="{{URL::to('product/'.$i->id)}}">{{$i->name}}</a></p>
	@endforeach
@stop