@extends('app')

@section('title')
	{{ $title_page }} - Biddings
@stop

@section('content')
	<h1>Biddings</h1>
	<h3>Domain: {{ $domain }} </h3>
	@if (count($origin) == 0)
		<h2>Sorry, no biddings!</h2>
	@endif
	<p>
		@for ($i = 0; $i < count($origin); $i++)
			<b>Origin: </b> {{ $origin[$i] }} <br>
			<b>Name: </b> {{ $title[$i] }} <br>
			<p>
				{{ $values[$i] }} <br>
			</p>
		@endfor
	</p>	
@stop
