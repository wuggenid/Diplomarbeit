@extends('...layout')

@section('content')

<div class="content">

    <div style="padding: 5px;">
    <br />
    <br />
        <div class="startbuttons">
            <ul>
            <li><form action="/Bons/Stammdaten" method="get">
                <button type="submit" class="btn btn-lg btn-success">Stammdaten</button>
            </form><br/></li>
            <li><a href="/Bons/Tageseingabe"><button type="button" class="btn btn-lg btn-success">Tageseingabe</button></a><br /><br /></li>
            <li><a href="/Bons/Listen"><button type="button" class="btn btn-lg btn-default">Listen</button></a><br /><br /><br/></li>
            <li><a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a></li>
            </ul>
        </div>
    </div>
</div>

@stop