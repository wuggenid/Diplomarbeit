@extends('layout')

@section('content')

<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <br />
    <br />
        <form action="/Artikel" method="get">
            <button type="submit" class="btn btn-lg btn-default">Artikelstamm</button>
        </form>
        <br /><br />

        <button type="button" class="btn btn-lg btn-default">Artikel-Gruppe</button><br /><br />

        <button type="button" class="btn btn-lg btn-default">Artikeleinkauf</button><br /><br />

        <a href="/"><button type="button" class="btn btn-lg btn-default">Exit</button></a>
    </div>
</div>

@stop