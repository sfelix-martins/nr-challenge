@extends('app')

@section('title')
    SSP-DF Biddings
@stop

@section('content')
    <h1>Biddings</h1>
    <h3>Domain: {{ $domain }}</h3>
    @foreach($data as $d)
        <p>
            <b>Name:</b> {{ $d['name'] }} <br>
            <b>File:</b><a href="{{ $domain }}{{ $d['file'] }}" title="{{ $d['title'] }}"> {{ $d['title'] }} </a> <br>
            <b>Starting Date:</b> {{ $d['starting_date'] }} <br>
            <b>Object:</b> {{ $d['object'] }} <br>
        </p>
        <hr>
    @endforeach
@stop