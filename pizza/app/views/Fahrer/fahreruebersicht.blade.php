@extends('...layout')

@section('content')

<h2>Fahrer</h2>
<div id="buttons" style="margin: 0 auto; display: table;">
    <br />
    <a href="/Fahrer/rechnungenZuordnen"><button type="button" style="width: 15em;" class="btn btn-lg btn-success">Rechnungen zuordnen</button></a>&nbsp;
    <button type="button" style="width: 15em;" class="btn btn-lg btn-warning">Zeiterfassung</button><br /><br />
    <button type="button" style="width: 15em; margin: 0 auto; display: table;" class="btn btn-lg btn-info">Tagessumme</button><br /><br />
</div>
@stop