@extends('...layout')

@section('content')

<h2>Fahrer</h2>
<div id="buttons" style="margin: 0 auto; display: table;">
    <br />
    <a href="/Fahrer/rechnungenZuordnen"><button type="button" style="width: 15em;" class="btn btn-lg btn-success">Rechnungen zuordnen</button></a>&nbsp;
    <a href="/Fahrer/zeiterfassung"><button type="button" style="width: 15em;" class="btn btn-lg btn-warning">Zeiterfassung</button></a><br /><br />
    <a href="/Fahrer/tagessumme"><button type="button" style="width: 15em; margin: 0 auto; display: table;" class="btn btn-lg btn-info">Tagessumme</button></a><br /><br />
</div>
<a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
@stop