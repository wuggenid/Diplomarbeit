@extends('layout')

@section('content')

<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <br />
    <br />
        <div class="radio" style="margin-left: 10em;position: fixed">
            <label><input type="radio" name="bestellungradio">Bestellungen verändern</label><br />
            <label><input type="radio" name="bestellungradio" checked="true">Neue Bestellungen</label>
        </div>
        <form action="/Bestellungen/create" method="get">
            <button type="submit" class="btn btn-lg btn-default">Bestellungen</button>
        </form>
        <br /><br />

        <button type="button" class="btn btn-lg btn-default">Drucken</button><br /><br />

        <button type="button" class="btn btn-lg btn-default">Letzte Anrufe</button><br /><br />

        <button type="button" class="btn btn-lg btn-default">Exit</button>
    </div>
</div>

@stop