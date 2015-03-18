@extends('...layout')

@section('content')

@if ($alert = Session::get('alert'))
  <div class="alert alert-warning">
      {{ $alert }}
  </div>
@endif

<h2>Artikelgruppenverwaltung</h2>
<div class="content">

    <div style="width:35%; float: left; padding: 10% 5% 0 0;">
        <ul id="contactform">
            <li>
                <label for="name"> Artikelgruppen-Nr </label><br/>
                <span class="fieldbox"><input type="text" name="artgnr" id="artgnr" onkeydown="javascript:artikelgKeyPress(this)" value="" /></span>
            </li>
            <li>
                <label for="email"> Artikelgruppen-Bezeichnung </label><br/>
                <span class="fieldbox"><input type="text" name="artgrubez" id="artgrubez" onkeydown="javascript:artikelgbKeyPress(this)" value="" /></span>
            </li>
        </ul>
    </div>


    <div style="width:65%; float: right; padding-top: 20px; padding-left: 5%; ">
        <h3>Suchkriterium</h3>
        <table class="artikeltabelle" style="width: 100%;">
            <thead>
                <tr>
                    <th width="25%" id="aid" style="padding-left: 5%;">Gruppen-Nr</th>
                    <th id="abez">Gruppenbezeichnung</th>
                </tr>
            </thead>
        </table>

        <table id="artikelgruppe" style="height: 300px; width: 100%; overflow-y: auto;">
            <tbody>
                <?php $xag = xag::orderby('AGNR')->get(); ?>
                @foreach($xag as $key => $ag)
                     <tr class="tablerow" id="{{$ag->AGNR}}" onclick="javascript:selectarticle('{{$ag->AGNR}}','{{$ag->AGBEZ}}')">
                         <td style="padding-left: 5%;">{{$ag->AGNR}}</td>
                         <td style="width: 100%; padding-left: 23%;">{{$ag->AGBEZ}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<div style="clear: both;">
    <br/><br/>
    <button style="width: 15em;" onclick="javascript:deletearticle()" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Artikelgruppe löschen </button>
    <button style="width: 15em;" onclick="javascript:newarticle()" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Neue Artikelgruppe </button>
    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Artikelgruppenliste drucken</button>
    <br/><br/>
    <a href="/"><button style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <button onclick="javascript:savearticle()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Artikelgruppe speichern</button>
    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-menu-left"></span> Rückgängig Änderung </button>
    <br/><br/>
</div>


<script language="javascript">

    var newart = false;
    var selectart = false;

    artgnr.value = artgrubez.value = '';
    newart = true;
    selectart = false;
    document.getElementById('artgnr').focus();


    function selectarticle(agnr ,agbez)
    {
        artgnr.value = agnr;
        $id = agnr;

        artgrubez.value = agbez;

        newart = false;
        selectart = true;
    }

    function newarticle()
    {
        artgnr.value = artgrubez.value = '';
        newart = true;
        selectart = false;
        document.getElementById('artgnr').focus();
    }

    function deletearticle()
    {
        if(newart == false && selectart == true)
        {
            if($id == artgnr.value)
            {
                window.location.href = "/Artikel/Artikelgruppe/delete/" + $id;
            }

            // Wenn die ID zwischenzeitig verändert wurde, darf er nichts löschen!
            else
                alert("Nicht möglich, weil die Artikelgruppennummer zwischenzeit geändert wurde");
        }

        else
            alert("Keine Artikelgruppe ausgewählt");
    }

    function savearticle()
    {
        //Artikeländerung
        //auch ID kann geändert werden
        //kann keine andere ID überspeichern
        if(newart == false && selectart == true)
        {
            $nid = artgnr.value;
            $agb = artgrubez.value;

            window.location.href = "/Artikel/Artikelgruppe/update"
                    + "?oldID=" + $id
                    + "&nid=" + $nid
                    + "&agb=" + $agb;
        }

        //Neuer Artikel
        else if(newart == true && selectart == false)
        {
            $id = artgnr.value;
            $agb = artgrubez.value;

            window.location.href = "/Artikel/Artikelgruppe/store"
                    + "?id=" + $id
                    + "&agb=" + $agb;
        }

        else
            alert("Artikelgruppe konnte nicht gespeichert werden!");
    }




    var selectedArtikelG = 1;
    function changeSelectedArtikelG(cselectedArtikelG)
    {
        var oldSelectedArtikelG = selectedArtikelG;
        selectedArtikelG = cselectedArtikelG;
        var table = document.getElementById('artikelgruppe');
        var rows = table.rows;
        if (selectedArtikelG > rows.length)
            selectedArtikelG--;
        if (selectedArtikelG < 1)
            selectedArtikelG++;
        rows[oldSelectedArtikelG-1].style.backgroundColor = "";
        rows[selectedArtikelG-1].style.backgroundColor = "#D8D8D8";
        var agid = rows[selectedArtikelG-1].cells[0].innerText;
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                var articles = JSON.parse(xhr.responseText);
                if (articles.length == 1)
                    selectarticle(articles[0]['AGNR'] ,articles[0]['AGBEZ']);
            }
        })
        xhr.open('GET', '/api/getArtikelG?artikelg=' + agid, true);
        xhr.send();
    }

    var check = 0;
    function artikelgKeyPress(e)
    {
        if (event.keyCode == 40)
        {
            if(check == 0) {
                changeSelectedArtikelG(selectedArtikelG);
                check = 1; }
            else
                changeSelectedArtikelG(selectedArtikelG+1);
        }
        else if (event.keyCode == 38)
            changeSelectedArtikelG(selectedArtikelG-1);

        if (event.keyCode == 13)
        {
            artgrubez.focus();
        }
    }

    function artikelgbKeyPress(e)
    {
        if (event.keyCode == 40)
        {
            if(check == 0) {
                changeSelectedArtikelG(selectedArtikelG);
                check = 1; }
            else
                changeSelectedArtikelG(selectedArtikelG+1);
        }
        else if (event.keyCode == 38)
            changeSelectedArtikelG(selectedArtikelG-1);

        if (event.keyCode == 13)
            savearticle();
    }

</script>

@stop