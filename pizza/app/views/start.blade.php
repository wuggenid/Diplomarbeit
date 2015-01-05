@extends('layout')

@section('content')


<div style="float: left;" class="startbuttons">
    <ul>
        <li><a href="/Bestellungen"> <button class="bbutton"> Bestellungen </button></a></li>
        <li><a href="/Artikel"> <button class="bbutton"> Artikel </button></a></li>
        <li><a href="/Kunden/create"><button class="bbutton"> Kunden </button></a></li>
        <li><button class="bbutton"> Lieferanten </button></li>
        <li><button class="bbutton"> Bons </button></li>
    </ul>
</div>

<div style="float: right;" class="startbuttons">
    <ul>
        <li><button class="bbutton"> Personal </button></li>
        <li><button class="bbutton"> Buchen </button></li>
        <li><button class="bbutton"> Fahrer </button></li>
        <li><button class="bbutton"> Statistik </button></li>
        <li><button class="bbutton"> Optionen </button></li>
    </ul>
</div>

<div class="startbuttons">
    <ul>
        <li><button class="bbutton"> Ende </button></li>
    </ul>
</div>


@stop
