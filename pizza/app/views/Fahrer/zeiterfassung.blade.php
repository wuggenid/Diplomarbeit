@extends('...layout')

@section('content')

<h2>Zeiterfassung</h2>

<select id="fahrer" size="10" style="float: right; width: 15em;">
    @foreach($personal as $person)
        <option>{{$person['VNAM']." ".$person['NNAM']." ".$person['PKZ']}}</option>
    @endforeach
</select>

@stop