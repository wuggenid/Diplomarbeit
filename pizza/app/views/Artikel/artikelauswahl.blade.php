@extends('...layout')

@section('content')

<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <br />
    <br />
        <div class="startbuttons">
            <ul>
            <li><form action="/Artikel/Artikelstamm" method="get">
                <button type="submit" class="btn btn-lg btn-success">Artikelstamm</button>
            </form><br/></li>
            <li><a href="/Artikel/Artikelgruppe"><button type="button" class="btn btn-lg btn-success">Artikel-Gruppe</button></a><br /><br /></li>
            <li><a href="/Artikel/Artikeleinkauf"><button type="button" class="btn btn-lg btn-default">Artikeleinkauf</button></a><br /><br /><br/></li>
            <li><a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a></li>
            </ul>
        </div>
    </div>
</div>

@stop