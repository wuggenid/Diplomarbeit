@extends('...layout')

@section('content')

<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <br />
    <br />
        <form action="/Artikel" method="get">
            <button type="submit" class="btn btn-lg btn-success">Artikelstamm</button>
        </form>
        <br /><br />

        <a href="/Artikelgruppe"><button type="button" class="btn btn-lg btn-primary">Artikel-Gruppe</button></a><br /><br />

        <button type="button" class="btn btn-lg btn-warning">Artikeleinkauf</button><br /><br />

        <a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    </div>
</div>

@stop