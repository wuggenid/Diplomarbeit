@extends('layout')

@section('content')

<table style="align-content: center;">
    <tbody>
        <tr>
                <td><a href="/"> <button class="btn btn-lg btn-danger vagueDangerButton" > Stornos </button></a></td>
                <td><a href="/"> <button class="btn btn-lg btn-danger vagueDangerButton"> Monatsübertrag </button></a></td>
        <tr>
        </tr>
                <td><a href="/"><button class="btn btn-lg btn-success vagueSuccessButton"> Monatsabschluss </button></a></td>
                <td><a href="/"><button class="btn btn-lg btn-success vagueSuccessButton"> Tagesstatistik </button></a></td>
        </tr>
        <tr>
                <td><a href="/"><button class="btn btn-lg btn-primary vaguePrimaryButton"> Anlegen Statistik </button></a></td>
                <td><a href="/"><button class="btn btn-lg btn-primary vaguePrimaryButton"> Jahresübertrag </button></a></td>
        <tr>
        </tr>
                <td><button class="btn btn-lg btn-warning vagueWarningButton"> Tagesabschluss </button></td>
                <td><button class="btn btn-lg btn-warning vagueWarningButton"> Tagesabschluss_K </button></td>
        </tr>
    </tbody>
</table>
<button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button>
<style type="text/css">
    TABLE TR TD BUTTON
    {
        width: 15em;
    }
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