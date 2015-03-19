@extends('...layout')

@section('content')

@if ($alert = Session::get('alert'))
  <div class="alert alert-warning">
      {{ $alert }}
  </div>
@endif

<h2>Bons-Stammdatenverwaltung</h2>
<div class="content">

    <div style="width:35%; float: left; padding: 10% 5% 0 0;">
        <ul id="contactform">
            <li>
                <label for="tel"> Telefon-Nr </label><br/>
                <span class="fieldbox"><input type="text" id="tel" onkeydown="javascript:artikelgKeyPress(this)" value="" /></span>
            </li>
            <li>
                <label for="typ"> Bon-Typ </label><br/>
                <span class="fieldbox"><input type="text" id="typ" onkeydown="javascript:artikelgbKeyPress(this)" value="" /></span>
            </li>
            <li>
                <label for="preis"> Einzelpreis </label><br/>
                <span class="fieldbox"><input type="text" id="epreis" onkeydown="javascript:artikelgbKeyPress(this)" value="" /></span>
            </li>
        </ul>
    </div>


    <div style="width:65%; float: right; padding-top: 20px; padding-left: 5%; ">
        <h3>Suchkriterium</h3>
        <table class="artikeltabelle" style="width: 100%;">
            <thead>
                <tr>
                    <th width="35%" id="aid" style="padding-left: 5%;">Tel-Nr</th>
                    <th id="abez">Bon-Typ</th>
                </tr>
            </thead>
        </table>

        <table id="artikelgruppe" style="height: 300px; width: 100%; overflow-y: auto;">
            <tbody>
                @foreach($bons as $key => $bon)
                     <tr class="tablerow" id="{{$bon->TEL}}" onclick="javascript:selectbon('{{$bon->TEL}}','{{$bon->TYP}}','{{$bon->EP}}')">
                         <td style="padding-left: 5%;">{{$bon->TEL}}</td>
                         <td style="width: 100%; padding-left: 35%;">{{$bon->TYP}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<div style="clear: both;">
    <br/><br/>
    <button style="width: 15em;" onclick="javascript:deletebon()" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Bon löschen </button>
    <button style="width: 15em;" onclick="javascript:newbon()" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Neuer Bon </button>
    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Bonliste drucken</button>
    <br/><br/>
    <a href="/"><button style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <button onclick="javascript:savebon()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Bon speichern</button>
    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-menu-left"></span> Rückgängig Änderung </button>
    <br/><br/>
</div>



<script language="javascript">
    var newbo = false;
    var selectbo = false;

    tel.value = typ.value = '';
    epreis.value = '0.00';
    newbo = true;
    selectbo = false;
    document.getElementById('tel').focus();


    function selectbon(btel, btyp, ep)
    {
        tel.value = btel;
        typ.value = btyp;
        epreis.value = ep;

        newbo = false;
        selectbo = true;
    }
</script>

@endsection