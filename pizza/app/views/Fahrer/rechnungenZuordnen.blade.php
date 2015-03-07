@extends('...layout')

@section('content')

<h2>Rechnungen zuordnen</h2>

<select id="fahrer" size="10" style="float: right; width: 10em;">
    @foreach($personal as $person)
        <option>{{$person['VNAM']." ".$person['NNAM']}}</option>
    @endforeach
</select>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Rechnungsnr.</th>
            <th>R-Datum</th>
            <th>R-Zeit</th>
            <th>Telefonnummer</th>
            <th>R-Summe</th>
            <th>Fahrer-Id</th>
            <th>Fahrer</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><input type="text" id="rnr"/></th>
            <th><input type="text" id="rdate"/></th>
            <th><input type="text" id="rtime"/></th>
            <th><input type="text" id="tel"/></th>
            <th><input type="text" id="rsum"/></th>
            <th><input type="text" id="driverid"/></th>
            <th><input type="text" id="driver"/></th>
        </tr>
    </tbody>
</table>
<br /><br /><br /><br /><br />
<a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
<style type="text/css">
    tbody tr th input
    {
        width: 100%;
    }
</style>
<script language="javascript">

</script>

@stop