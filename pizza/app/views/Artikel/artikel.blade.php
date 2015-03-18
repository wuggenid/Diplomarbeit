@extends('...layout')

@section('content')

@if ($alert = Session::get('alert'))
  <div class="alert alert-warning">
      {{ $alert }}
  </div>
@endif

<h2>Artikel</h2>
<div class="content">

    <div style="width:35%; float: left; padding-right: 5%;">
        <ul id="contactform">
            <li>
                <label for="name"> Artikel-Nr </label><br/>
                <span class="fieldbox"><input onfocus="javascript:sartikel()" onkeydown="javascript:artikelKeyPress(this)" type="text" name="artnr" id="artnr" value="" /></span>
            </li>
            <li>
                <label for="name"> Artikel-Bezeichnung </label><br/>
                <span class="fieldbox"><input onfocus="javascript:sartikel()" onkeydown="if(event.keyCode == 13) artgru.focus();" onkeydown="javascript:artikelKeyPress(this)" type="text" name="artbez" id="artbez" value="" /></span>
            </li>
            <li>
                <label for="email"> Artikel-Gruppe </label><br/>
                <span class="fieldbox"><input onfocus="javascript:sgroup()" onkeydown="javascript:artikelgKeyPress(this)" type="text" name="artgru" id="artgru" value="" /></span>
            </li>
            <li>
                <label for="contact"> Einzelpreis (inkl. Mwst.) </label><br/>
                <span class="fieldbox"><input type="text" onkeydown="if(event.keyCode == 13) mwst.focus();" name="epreis" id="epreis" value="" /></span>
            </li>
            <li>
                <label for="contact"> Mwst. </label><br/>
                <span class="fieldbox"><input onfocus="javascript:smwst()" onkeydown="javascript:artikelmKeyPress(this)" type="text" name="mwst" id="mwst" value="" /></span>
            </li>
            <li>
                <label for="msg"> Verkaufsmenge (gesamt) </label><br/>
                <span class="fieldbox"><input type="text" name="vmenge" id="vmenge" value="" disabled/></span>
            </li>
        </ul>
    </div>


    <div style="width:65%; float: right; padding-top: 20px; padding-left: 5%; ">
        <h3>Suchkriterium</h3>
        <table class="artikeltabelle" style="width: 100%;">
            <thead>
                <tr>
                    <th width="25%" id="aid" style="padding-left: 5%;">Art-Nr</th>
                    <th id="abez">Bezeichnung</th>
                </tr>
            </thead>
        </table>

        <table id="artikel" style="height: 300px; width: 100%; overflow-y: auto; display: block;">
            <tbody>
                @foreach($articles as $key => $article)
                     <tr class="tablerow" onClick="javascript:selectarticle('{{$article->ANR}}','{{$article->A0}}','{{$article->AG}}', '{{$article->CB}}','{{$article->ASS}}', '{{$article->VGS}}')">
                         <td style="padding-left: 5%;">{{$article->ANR}}</td>
                         <td style="width: 100%; padding-left: 20%;">{{$article->A0}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>
        <table id="artikelgruppe" style="height: 300px; width: 100%; overflow-y: auto; display: none;">
            <tbody>
                <?php $xag = xag::orderby('AGNR')->get(); ?>
                @foreach($xag as $key => $ag)
                     <tr class="tablerow" id="{{$ag->AGNR}}" onclick="artgru.value = '{{$ag->AGNR}}';">
                         <td style="padding-left: 5%;">{{$ag->AGNR}}</td>
                         <td style="width: 100%; padding-left: 24%;">{{$ag->AGBEZ}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>
        <table id="artikelmwst" style="height: 300px; width: 100%; overflow-y: auto; display: none;">
            <tbody >
                 <tr class="tablerow" onclick="mwst.value = '1';">
                     <td style="padding-left: 5%;"> 1 </td>
                     <td style="width: 100%; padding-left: 24%;"> 10% </td>
                 </tr>
                 <tr class="tablerow"  onclick="mwst.value = '2';" >
                     <td style="padding-left: 5%;"> 2 </td>
                     <td style="width: 100%; padding-left: 24%;"> 20% </td>
                 </tr>
            </tbody>
        </table>
    </div>
</div>



<div style="clear: both;">
    <br/><br/>
    <button onclick="javascript:deletearticle()" style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Artikel löschen </button>
    <button onclick="javascript:newarticle()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Neuer Artikel </button>
    <a href="/Artikel/Artikelmonatsstatistik"><button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-stats"></span> Artikelmonatsstatistik</button></a>
    <br/><br/>
    <a href="/"><button style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <button onclick="javascript:savearticle()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Artikel speichern</button>
    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Artikelliste drucken </button>
    <br/><br/>
</div>


<script language="javascript">

    var newart = false;
    var selectart = false;

    artnr.value = artbez.value = artgru.value = mwst.value = ''; epreis.value = vmenge.value = '0';
    newart = true;
    selectart = false;
    document.getElementById('artnr').focus();

    function sgroup()
    {
        document.getElementById('artikel').style.display = "none";
        document.getElementById('artikelgruppe').style.display = "block";
        document.getElementById('artikelmwst').style.display = "none";
        document.getElementById('aid').innerText = "Gruppen-Nr";
        document.getElementById('abez').innerText = "Gruppenbezeichnung";
    }
    function sartikel()
    {
        document.getElementById('artikel').style.display = "block";
        document.getElementById('artikelgruppe').style.display = "none";
        document.getElementById('artikelmwst').style.display = "none";
        document.getElementById('aid').innerText = "Art-Nr";
        document.getElementById('abez').innerText = "Bezeichnung";
    }
    function smwst()
    {
        document.getElementById('artikelmwst').style.display = "block";
        document.getElementById('artikelgruppe').style.display = "none";
        document.getElementById('artikel').style.display = "none";
        document.getElementById('aid').innerText = "ID";
        document.getElementById('abez').innerText = "Art";
    }

    function selectarticle(anr ,a0, ag, cb, ass, vgs)
    {
        artnr.value = anr;
        $id = anr;

        artbez.value = a0;
        artgru.value = ag;
        epreis.value = cb;
        mwst.value = ass;
        vmenge.value = vgs;

        newart = false;
        selectart = true;
    }

    function newarticle()
    {
        artnr.value = artbez.value = artgru.value = mwst.value = ''; epreis.value = vmenge.value = '0';
        newart = true;
        selectart = false;
        document.getElementById('artnr').focus();
    }

    function deletearticle()
    {
        if(newart == false && selectart == true)
        {
            if($id == artnr.value)
            {
                window.location.href = "/Artikel/Artikelstamm/delete/" + $id;
            }

            // Wenn die ID zwischenzeitig verändert wurde, darf er nichts löschen!
            else
                alert("Nicht möglich, weil die Artikelnummer zwischenzeit geändert wurde");
        }

        else
            alert("Keinen Artikel ausgewählt");
    }

    function savearticle()
    {
        //Artikeländerung
        //auch ID kann geändert werden
        //kann keine andere ID überspeichern
        if(newart == false && selectart == true)
        {
            $nid = artnr.value;

            $a0 = artbez.value;
            $ag = artgru.value;
            $cb = epreis.value;
            $ass = mwst.value;
            $vgs = vmenge.value;

            window.location.href = "/Artikel/Artikelstamm/update?oldID=" + $id
                    + "&nid=" + $nid
                    + "&a0=" + $a0
                    + "&ag=" + $ag
                    + "&cb=" + $cb
                    + "&ass=" + $ass
                    + "&vgs=" + $vgs;
        }

        //Neuer Artikel
        else if(newart == true && selectart == false)
        {
            $id = artnr.value;

            $a0 = artbez.value;
            $ag = artgru.value;
            $cb = epreis.value;
            $ass = mwst.value;
            $vgs = vmenge.value;

            window.location.href = "/Artikel/Artikelstamm/store"
                    + "?id=" + $id
                    + "&a0=" + $a0
                    + "&ag=" + $ag
                    + "&cb=" + $cb
                    + "&ass=" + $ass
                    + "&vgs=" + $vgs;
        }

        else
            alert("Artikel konnte nicht gespeichert werden!");
    }



    var selectedArtikel = 1;
    function changeSelectedArtikel(cselectedArtikel)
    {
        var oldSelectedArtikel = selectedArtikel;
        selectedArtikel = cselectedArtikel;
        var table = document.getElementById('artikel');
        var rows = table.rows;
        if (selectedArtikel > rows.length)
            selectedArtikel--;
        if (selectedArtikel < 1)
            selectedArtikel++;
        rows[oldSelectedArtikel-1].style.backgroundColor = "";
        rows[selectedArtikel-1].style.backgroundColor = "#D8D8D8";
        var aid = rows[selectedArtikel-1].cells[0].innerText;
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                var articles = JSON.parse(xhr.responseText);
                if (articles.length == 1)
                    selectarticle(articles[0]['ANR'] ,articles[0]['A0'], articles[0]['AG'], articles[0]['CB'], articles[0]['ASS'], articles[0]['VGS']);
            }
        })
        xhr.open('GET', '/api/getArtikel?artikel=' + aid, true);
        xhr.send();
    }

    var check = 0;
    function artikelKeyPress(e)
    {
        if (event.keyCode == 40)
        {
            if(check == 0) {
                changeSelectedArtikel(selectedArtikel);
                check = 1; }
            else
                changeSelectedArtikel(selectedArtikel+1);
        }
        else if (event.keyCode == 38)
            changeSelectedArtikel(selectedArtikel-1);

        if (event.keyCode == 13)
            artbez.focus();
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
        artgru.value = rows[selectedArtikelG-1].cells[0].innerText;
    }

    var checkg = 0;
    function artikelgKeyPress(e)
    {
        if (event.keyCode == 40)
        {
            if(checkg == 0) {
                changeSelectedArtikelG(selectedArtikelG);
                checkg = 1; }
            else
                changeSelectedArtikelG(selectedArtikelG+1);
        }
        else if (event.keyCode == 38)
            changeSelectedArtikelG(selectedArtikelG-1);

        if (event.keyCode == 13)
            epreis.focus();
    }



    var selectedArtikelM = 1;
    function changeSelectedArtikelM(cselectedArtikelM)
    {
        var oldSelectedArtikelM = selectedArtikelM;
        selectedArtikelM = cselectedArtikelM;
        var table = document.getElementById('artikelmwst');
        var rows = table.rows;
        if (selectedArtikelM > rows.length)
            selectedArtikelM--;
        if (selectedArtikelM < 1)
            selectedArtikelM++;
        rows[oldSelectedArtikelM-1].style.backgroundColor = "";
        rows[selectedArtikelM-1].style.backgroundColor = "#D8D8D8";
        mwst.value = rows[selectedArtikelM-1].cells[0].innerText;
    }
    var checkm = 0;
        function artikelmKeyPress(e)
        {
            if (event.keyCode == 40)
            {
                if(checkm == 0) {
                    changeSelectedArtikelM(1);
                    checkm = 1; }
                else {
                    changeSelectedArtikelM(2);
                    alert("second");
                    }
            }
            else if (event.keyCode == 38)
                changeSelectedArtikelM(1);

            if (event.keyCode == 13)
                savearticle();
        }

</script>

@stop