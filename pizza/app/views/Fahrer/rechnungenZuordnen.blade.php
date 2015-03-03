@extends('...layout')

@section('content')

<h2>Rechnungen zuordnen</h2>

<select id="fahrer" size="2" style="float: right; width: 10em;">
    <option>Edi CHEF</option>
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

<style type="text/css">
    tbody tr th input
    {
        width: 100%;
    }
</style>
<script language="javascript">
    var fahrerOptions = document.getElementById('fahrer');

</script>

@stop