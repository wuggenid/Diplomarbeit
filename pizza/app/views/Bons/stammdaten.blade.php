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
                <span class="fieldbox"><input type="text" id="tel" onkeydown="javascript:bonKeyPress(this)" /></span>
            </li>
            <li>
                <label for="typ"> Bon-Typ </label><br/>
                <span class="fieldbox"><input type="text" id="typ" onkeydown="javascript:bonKeyPress(this)" /></span>
            </li>
            <li>
                <label for="preis"> Einzelpreis </label><br/>
                <span class="fieldbox"><input type="text" id="epreis" onkeydown="javascript:bonSKeyPress(this)" /></span>
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

        <table id="bons" style="max-height: 300px; width: 100%; overflow-y: auto;">
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



    var selectedBon = 1;
    function changeSelectedBon(cselectedBon)
    {
        var oldselectedBon = selectedBon;
        selectedBon = cselectedBon;
        var table = document.getElementById('bons');
        var rows = table.rows;
        if (selectedBon > rows.length)
            selectedBon--;
        if (selectedBon < 1)
            selectedBon++;
        rows[oldselectedBon-1].style.backgroundColor = "";
        rows[selectedBon-1].style.backgroundColor = "#D8D8D8";
        var bon = rows[selectedBon-1].cells[0].innerText;
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                var bons = JSON.parse(xhr.responseText);
                if (bons.length == 1)
                    selectbon(bons[0]['TEL'] ,bons[0]['TYP'],bons[0]['EP']);
            }
        })
        xhr.open('GET', '/api/getBon?bon=' + bon, true);
        xhr.send();
    }

    var check = 0;
    var check2 = 0;
    function bonKeyPress(e)
    {
        if (event.keyCode == 40)
        {
            if(check == 0) {
                changeSelectedBon(selectedBon);
                check = 1; }
            else
                changeSelectedBon(selectedBon+1);
        }
        else if (event.keyCode == 38)
            changeSelectedBon(selectedBon-1);

        if (event.keyCode == 13)
        {
            if(check2 == 0) {
                typ.focus();
                check2 = 1;
            }
            else {
                epreis.focus();
                check2 = 0;
            }
        }
    }

    function bonSKeyPress(e)
    {
        if (event.keyCode == 40)
        {
            if(check == 0) {
                changeSelectedBon(selectedBon);
                check = 1; }
            else
                changeSelectedBon(selectedBon+1);
        }
        else if (event.keyCode == 38)
            changeSelectedBon(selectedBon-1);

        if (event.keyCode == 13)
            savebon();
    }
</script>

@endsection