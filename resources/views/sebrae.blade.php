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
			<p>
				<b>Origin: </b> {{ $origin[$i] }} <br>
				<b>Name: </b> {{ $title[$i] }} <br>
				@for ($j = 0; $j < count($values[$i]); $j++)
					@if ($j == 0)
						<b>Object: </b>
					@elseif ($j == 1)
						<b>Starting Date: </b>
					@elseif ($j == 2)
						<b>Status: </b>
					@elseif ($j == 3)
						<b>Address: </b>
					@elseif ($j == 4)
						<b>Phone Number: </b>
					@else 
						<b>Fax: </b>
					@endif
					{{ $values[$i][$j] }} <br>
				@endfor
			</p>
		@endfor
	</p>	
@stop
