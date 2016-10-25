@extends('app')

@section('title')
    Biddings
@stop

@section('content')   
    <h1>Biddings</h1>
    @foreach ( $biddings as $bidding )
        <a href="/nr-challenge/public/licitacoes/{{ $bidding->id }}">
            <p>
                <b>Name: </b> {{ $bidding->name }} </br>
                <b>Origin: </b> {{ $bidding->origin }} </br>
                <b>Starting Date: </b> {{ $bidding->starting_date }} </br>
                @if (!empty($bidding->update_date))
                    <b>Update Date: </b> {{ $bidding->update_date }} </br>
                @endif
            </p>
        </a>
    @endforeach
@stop
