@extends('app')

@section('title')
	CNQP - Biddings
@stop

@section('content')
	<h1>Biddings</h1>
	<h3>Domain: {{ $domain }} </h3>
	@if (count($title) == 0)
		<h2>Sorry, no biddings!</h2>
	@endif
	@for ($i = 0; $i < count($title); $i++)
		<p>
			<b>Name: </b> {{ $title[$i] }} <br>
			<b>Object:</b>{{ $object[$i] }}<br>
			<b>Starting Date: </b> {{ $starting_date[$i] }} <br>
			<b>Attachments: </b> <a href='{{ $domain }}{{ $link[$i] }}' title="Plummets Warning">Plummets Warning</a>
		</p>
	@endfor
@stop