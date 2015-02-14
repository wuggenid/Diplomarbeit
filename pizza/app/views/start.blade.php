@extends('layout')

@section('content')


<div style="float: left;" class="startbuttons">
    <ul>
        <li><a href="/Bestellungen"> <button class="btn btn-lg btn-success vagueSuccessButton" > Bestellungen </button></a></li>
        <li><a href="/Artikelauswahl"> <button class="btn btn-lg btn-primary vaguePrimaryButton"> Artikel </button></a></li>
        <li><a href="/Kunden/create"><button class="btn btn-lg btn-info vagueInfoButton"> Kunden </button></a></li>
        <li><a href="/Lieferanten"><button class="btn btn-lg btn-warning vagueWarningButton"> Lieferanten </button></a></li>
        <li><button class="btn btn-lg"> Bons </button></li>
    </ul>
</div>

<div style="float: right;" class="startbuttons">
    <ul>
        <li><button class="btn btn-lg btn-danger vagueDangerButton"> Personal </button></li>
        <li><button class="btn btn-lg btn-warning vagueWarningButton"> Buchen </button></li>
        <li><button class="btn btn-lg vagueButton"> Fahrer </button></li>
        <li><button class="btn btn-lg btn-primary vaguePrimaryButton"> Statistik </button></li>
        <li><button class="btn btn-lg btn-default vagueDefaultButton"> Optionen </button></li>
    </ul>
</div>
<style type="text/css">
    .vagueSuccessButton
    {
        background-color: #8ce88c;
        border-color: #8ce88c;
    }
    .vaguePrimaryButton
    {
        background-color: #73baf7;
        border-color: #73baf7;
    }
    .vagueWarningButton
    {
        background-color: #47FbC6;
        border-color: #47FbC6;
    }
    .vagueDangerButton
    {
        background-color: #f9837f;
        border-color: #f9837f;
    }
    .vagueInfoButton
    {
        background-color: #b1D0C3;
        border-color: #b1D0C3;
    }
</style>
@stop
