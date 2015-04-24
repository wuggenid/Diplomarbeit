@extends('...layout')

@section('content')

<div style="padding: 0 30px;">

    <div style="padding: 5px;" class="startbuttons">
    <br /><br />

        <ul>
            <form action="/Bestellungen/create" method="get">
                <li><button type="submit" class="btn btn-lg btn-success">Neue Bestellungen</button></li>
            </form>

            <li><button class="btn btn-lg btn-success" name="bestellungradio">Bestellungen verändern</button><br /><br /></li>

            <li><button type="button" class="btn btn-lg btn-warning">Drucken</button><br /></li>

            <li><a href="/Bestellungen/letzteAnrufe"><button type="button" class="btn btn-lg btn-primary">Letzte Anrufe</button></a><br/><br /></li>

            <li><a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a></li>
        </ul>
    </div>
</div>

@stop