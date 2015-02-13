@extends('layout')

@section('content')


<div style="float: left;" class="startbuttons">
    <ul>
        <li><a href="/Bestellungen"> <button class="btn btn-lg btn-success" > Bestellungen </button></a></li>
        <li><a href="/Artikelauswahl"> <button class="btn btn-lg btn-primary"> Artikel </button></a></li>
        <li><a href="/Kunden/create"><button class="btn btn-lg btn-info"> Kunden </button></a></li>
        <li><a href="/Lieferanten"><button class="btn btn-lg btn-warning"> Lieferanten </button></a></li>
        <li><button class="btn btn-lg"> Bons </button></li>
    </ul>
</div>

<div style="float: right;" class="startbuttons">
    <ul>
        <li><button class="btn btn-lg btn-danger"> Personal </button></li>
        <li><button class="btn btn-lg btn-warning"> Buchen </button></li>
        <li><button class="btn btn-lg"> Fahrer </button></li>
        <li><button class="btn btn-lg btn-primary"> Statistik </button></li>
        <li><button class="btn btn-lg btn-default"> Optionen </button></li>
    </ul>
</div>
@stop
