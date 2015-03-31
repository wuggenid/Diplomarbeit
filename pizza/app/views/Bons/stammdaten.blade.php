@extends('...layout')

@section('content')

@if ($alert = Session::get('alert'))
  <div class="alert alert-warning">
      {{ $alert }}
  </div>
@endif

<h2>Bons-Stammdatenverwaltung</h2>
<div class="content">

    <div style="width:35%; float: left; padding: 50px 5% 0 0;">
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


    <div style="width:65%; float: right; padding-top: 10px; padding-left: 5%; ">
        <h3>Suchkriterium</h3>
        <table class="artikeltabelle" style="width: 100%;">
            <thead>
                <tr>
                    <th width="35%" id="aid" style="padding-left: 5%;">Tel-Nr</th>
                    <th id="abez">Bon-Typ</th>
                </tr>
            </thead>
        </table>

        <table id="artikelgruppe" style="max-height: 300px; width: 100%; overflow-y: auto;">
            <tbody>
                @foreach($bons as $key => $bon)
                     <tr class="tablerow" id="{{$bon->TEL}}" onclick="javascript:selectbon('{{$bon->TEL}}','{{$bon->TYP}}','{{$bon->EP}}')">
                         <td width="40%" style="padding-left: 5%;">{{$bon->TEL}}</td>
                         <td style="width: 100%; padding-left: 7%;">{{$bon->TYP}}</td>
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
        $id = btel;
        $bezeichnung = btyp;
        typ.value = btyp;
        epreis.value = ep;

        newbo = false;
        selectbo = true;
    }

    function newbon()
    {
        tel.value = typ.value = '';
        epreis.value = '0.00';
        newbo = true;
        selectbo = false;
        document.getElementById('tel').focus();
    }

    function deletebon()
    {
        if(newbo == false && selectbo == true)
        {
            window.location.href = "/Bons/Stammdaten/delete/" + $id;
        }

        else
            alert("Keinen Bon ausgewählt");
    }

    function savebon()
    {
        //Bonänderung
        if(newbo == false && selectbo == true)
        {
            $nid = tel.value;
            $nbezeichnung = typ.value;
            $preis = epreis.value;

            window.location.href = "/Bons/Stammdaten/update"
            + "?oldID=" + $id
            + "&nid=" + $nid
            + "&typ=" + $bezeichnung
            + "&ntyp=" + $nbezeichnung
            + "&preis=" + $preis;
        }

        //Neuer Bon
        else if(newbo == true && selectbo == false && tel.value != "")
        {
            $id = tel.value;
            $bezeichnung = typ.value;
            $preis = epreis.value;

            window.location.href = "/Bons/Stammdaten/store"
            + "?id=" + $id
            + "&typ=" + $bezeichnung
            + "&preis=" + $preis;
        }

        else if(tel.value == "" && typ.value == "")
            alert("Es wurden keine Daten eingegeben!");

        else
            alert("Bon konnte nicht gespeichert werden!");
    }
</script>

@endsection