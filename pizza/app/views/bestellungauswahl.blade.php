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
            <button type="submit" class="btn btn-lg btn-success">Bestellungen</button>
        </form>
        <br /><br />

        <button type="button" class="btn btn-lg btn-warning">Drucken</button><br /><br />

        <button type="button" class="btn btn-lg btn-primary">Letzte Anrufe</button><br /><br />

        <a href="/"><button type="button" class="btn btn-lg btn-danger">Exit</button></a>
    </div>
</div>

@stop