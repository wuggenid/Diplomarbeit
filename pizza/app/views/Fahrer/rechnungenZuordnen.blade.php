@extends('...layout')

@section('content')

<h2>Rechnungen zuordnen</h2>

<select id="fahrer" size="10" style="float: right; width: 10em;">
    @foreach($personal as $person)
        <option>{{$person['VNAM']." ".$person['NNAM']." ".$person['PKZ']}}</option>
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
    @foreach($ohneFahrer as $key => $of)
        <tr>
            <th><input type="text" class="rnr" value="{{$of->RNR}}" disabled/></th>
            <th><input type="text" class="rdate" value="{{date('d.m.Y',strtotime($of->RDT))}}" disabled/></th>
            <th><input type="text" class="rtime" value="{{explode(' ',$of->RZT)[1]}}" disabled/></th>
            <th><input type="text" class="tel" value="{{$of->TEL}}" disabled/></th>
            <th><input type="text" class="rsum" value="{{$of->RSU}}" disabled/></th>
            <th><input type="text" class="driverid" value="{{$of->FAHR}}"/></th>
            <th><input type="text" class="driver"/></th>
        </tr>
    @endforeach
    </tbody>
</table>
<br /><br /><br /><br /><br />
<a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
<style type="text/css">
    tbody tr th input
    {
        width: 100%;
        font-weight: normal;
    }
</style>
<script language="javascript">
    document.getElementsByClassName('driverid')[0].focus();
</script>

@stop