@extends('...layout')

@section('content')

<h2>Artikel</h2>
<div style="padding: 5px 30px;">

    <div style="width:35%; float: left; padding-right: 5%;">
        <ul id="contactform">
            <li>
                <label for="name"> Artikel-Nr </label><br/>
                <span class="fieldbox"><input onfocus="javascript:sartikel()" type="text" name="artnr" id="artnr" value="" /></span>
            </li>
            <li>
                <label for="name"> Artikel-Bezeichnung </label><br/>
                <span class="fieldbox"><input onfocus="javascript:sartikel()" type="text" name="artbez" id="artbez" value="" /></span>
            </li>
            <li>
                <label for="email"> Artikel-Gruppe </label><br/>
                <span class="fieldbox"><input onfocus="javascript:sgroup()" type="text" name="artgru" id="artgru" value="" /></span>
            </li>
            <li>
                <label for="contact"> Einzelpreis (inkl. Mwst.) </label><br/>
                <span class="fieldbox"><input type="text" name="epreis" id="epreis" value="" /></span>
            </li>
            <li>
                <label for="contact"> Mwst. </label><br/>
                <span class="fieldbox"><input onfocus="javascript:smwst()" type="text" name="mwst" id="mwst" value="" /></span>
            </li>
            <li>
                <label for="msg"> Verkaufsmenge (gesamt) </label><br/>
                <span class="fieldbox"><input type="text" name="vmenge" id="vmenge" value="" disabled/></span>
            </li>
        </ul>
    </div>


    <div style="width:65%; float: right; padding-top: 20px; padding-left: 5%; ">
        <h3>Suchkriterium</h3>

        <table class="scroll" style="width: 100%;">
            <thead>
                <tr>
                    <th id="aid" style="text-align: left;">Art-Nr</th>
                    <th id="abez" style="text-align: left;">Bezeichnung</th>
                </tr>
            </thead>
        </table>
        <table id="artikel" style="height: 300px; width: 100%; overflow-y: auto; display: block;">
            <tbody>
                @foreach($articles as $key => $article)
                     <tr class="tablerow" onClick="javascript:selectarticle('{{$article->ANR}}','{{$article->A0}}','{{$article->AG}}', '{{$article->CB}}','{{$article->ASS}}', '{{$article->VGS}}')">
                         <td style="text-align: left; padding-left: 5%;">{{$article->ANR}}</td>
                         <td style="width: 1000px; padding-left: 5%;">{{$article->A0}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>

        <table id="artikelgruppe" style="height: 300px; width: 100%; overflow-y: auto; display: none;">
            <tbody>
                <?php $xag = xag::orderby('AGNR')->get(); ?>

                @foreach($xag as $key => $ag)
                     <tr class="tablerow" id="{{$ag->AGNR}}" onclick="artgru.value = '{{$ag->AGNR}}';">
                         <td style="text-align: left; padding-left: 5%;">{{$ag->AGNR}}</td>
                         <td style="width: 1000px; padding-left: 5%;">{{$ag->AGBEZ}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>

        <table id="artikelmwst" style="height: 300px; width: 100%; overflow-y: auto; display: none;">
            <tbody >
                 <tr style="text-align: left;" class="tablerow" onclick="mwst.value = '1';">
                     <td style="text-align: left; padding-left: 5%;" width="100%;"> 1 </td>
                     <td style="text-align: left; "> 10% </td>
                 </tr>
                 <tr class="tablerow"  onclick="mwst.value = '2';" >
                     <td style="text-align: left; padding-left: 5%;"> 2 </td>
                     <td style="text-align: left;"> 20% </td>
                 </tr>
            </tbody>
        </table>
    </div>
</div>



<div style="clear: both;">
    <br/><br/>
    {{-- Form::open(array('url' => "/Artikel/$article->(artnr.value)" , 'method' => 'delete')) --}}
            <button onclick="javascript:deletearticle()" style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Artikel löschen </button>
        {{-- Form::close() --}}

    <button onclick="javascript:newarticle()" style="width: 12em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Neuer Artikel </button>
    <button style="width: 12em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-stats"></span> Artikelmonatsstatistik</button>
    <br/><br/>
    <a href="/"><button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <button onclick="javascript:savearticle()" style="width: 12em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Artikel speichern</button>
    <button style="width: 12em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Artikelliste drucken </button>
    <br/><br/>
</div>


<script language="javascript">

    var newart = false;
    var selectart = false;

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

        //alert(id);
        //**window.location.href = "{{-- url('/Artikel' . $article->id . 'destroy') --}}";
    }

    function savearticle()
    {
        //auch ID kann geändert werden
        //kann keine andere ID überspeichern
        if(newart == false && selectart == true)
            alert("yes");
        else
            alert("no");
    }

</script>

@stop