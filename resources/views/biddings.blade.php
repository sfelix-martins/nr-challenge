@extends('app')

@section('title')
    Biddings
@stop

@section('content')   
    <h1>Biddings</h1>

    @foreach ( $biddings as $bidding )
        <p>
            <b>Name: </b> {{ $bidding->name }} </br>
            <b>Origin: </b> {{ $bidding->origin }} </br>
            <b>Starting Date: </b> {{ $bidding->starting_date }} </br>
            @if (!empty($bidding->update_date))
                <b>Update Date: </b> {{ $bidding->update_date }} </br>
            @endif
        </p>
    @endforeach
    <hr>
    <h2>Attachments</h2>
    <table>
        @foreach ( $attachments as $attachment )
            <tr>
                <td><b>Name: </b> {{ $attachment->name }} </td>
                <td><b>File: </b> <a href="{{ $attachment->file }}"> {{ $attachment->file }} </a> </td>
            </tr>
        @endforeach
    </table>
    <hr>
    <h2>Objects</h2>
    <table>
        <tr>
            <td><b>Description</b></td>
            <td><b>Quantity</b></td>
            <td><b>Unit</b></td>
        </tr>
        @foreach ( $objects as $object )
            <tr>
                <td> {{ $object->description }} </td>
                <td> {{ $object->quantity }} </td>
                <td> {{ $object->unit }} </td>
            </tr>
        @endforeach
    </table>
@stop
