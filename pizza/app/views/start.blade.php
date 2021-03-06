@extends('layout')

@section('content')


<div style="float: left;" class="startbuttons">
    <ul>
        <li><a href="/Bestellungen"> <button class="btn btn-lg btn-danger vagueDangerButton" > Bestellungen </button></a></li>
        <li><a href="/Artikel"> <button class="btn btn-lg btn-danger vagueDangerButton"> Artikel </button></a></li>
        <li><a href="/Kunden/create"><button class="btn btn-lg btn-success vagueSuccessButton"> Kunden </button></a></li>
        <li><a href="/Lieferanten"><button class="btn btn-lg btn-success vagueSuccessButton"> Lieferanten </button></a></li>
        <li><a href="/Bons"><button class="btn btn-lg btn-default vagueDefaultButton"> Bons </button></a></li>
    </ul>
</div>

<div style="float: right;" class="startbuttons">
    <ul>
        <li><a href="/Personal"><button class="btn btn-lg btn-primary vaguePrimaryButton"> Personal </button></a></li>
        <li><a href="/Fahrer"><button class="btn btn-lg btn-primary vaguePrimaryButton"> Fahrer </button></a></li>
        <li><a href="/Buchen"><button class="btn btn-lg btn-warning vagueWarningButton"> Buchen </button></a></li>
        <li><button class="btn btn-lg btn-warning vagueWarningButton"> Statistik </button></li>
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
