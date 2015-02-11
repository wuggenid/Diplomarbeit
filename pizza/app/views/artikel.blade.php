@extends('layout')

@section('content')

<h2>Artikel</h2>
<div style="padding: 5px 30px;">

    <div style="width:40%; float: left; padding-right: 5%;">
        <ul id="contactform">
            <li>
                <label for="name"> Artikel-Nr </label><br/>
                <span class="fieldbox"><input type="text" name="artnr" id="artnr" value="" /></span>
            </li>
            <li>
                <label for="name"> Artikel-Bezeichnung </label><br/>
                <span class="fieldbox"><input type="text" name="artbez" id="artbez" value="" /></span>
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
                <span class="fieldbox"><input type="text" name="mwst" id="mwst" value="" /></span>
            </li>
            <li>
                <label for="msg"> Verkaufsmenge (gesamt) </label><br/>
                <span class="fieldbox"><input type="text" name="vmenge" id="vmenge" value="" disabled/></span>
            </li>
        </ul>
    </div>


    <div style="width:60%; float: right; padding-top: 20px; padding-left: 5%; ">
        <h3>Suchkriterium</h3>

        <table class="scroll" style="width: 63%;">
            <thead>
                <tr>
                    <th>Art-Nr</th>
                    <th>Bezeichnung</th>
                </tr>
            </thead>
            </table>
            <table style="height: 300px; width: 63%; overflow-y: auto; display: block;">
            <tbody>
                @foreach($articles as $key => $article)
                     <tr class="tablerow" id="{{$article->ANR}}"
                     onClick="artnr.value = '{{$article->ANR}}';
                              artbez.value = '{{$article->A0}}';
                              artgru.value = '{{$article->AG}}';
                              epreis.value = '{{$article->CB}}';
                              mwst.value = '1';
                              vmenge.value = '{{$article->VGS}}';">

                         <td style="width: 20%;">{{$article->ANR}}</td>
                         <td style="width: 250%;">{{$article->A0}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>



    </div>
</div>



<div style="clear: both;">
    <br/><br/>
    <button style="width: 12em;" onClick="artnr.value = artbez.value = artgru.value = mwst.value = ''; epreis.value = vmenge.value = '0';" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Neuer Artikel </button>

    {{-- Form::open(array('url' => "/Artikel/$article->(artnr.value)" , 'method' => 'delete')) --}}
        <button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Artikel löschen </button>
    {{-- Form::close() --}}

    <button style="width: 12em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-stats"></span> Artikelmonatsstatistik</button>
    <br/><br/>
    <a href="/"><button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <button style="width: 12em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Artikel speichern</button>
    <button style="width: 12em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Artikelliste drucken </button>
    <br/><br/>
</div>


<script language="javascript">
    function sgroup()
    {
        <?php $xag = xag::orderby('AGNR')->get(); ?>

        @foreach($xag as $key => $ag)
        alert(document.getElementById("suchkriterium").option[e.selectedIndex].value);

        @endforeach
    }

    function deleteart(id)
    {
        alert(id);
        //**window.location.href = "{{-- url('/Artikel' . $article->id . 'destroy') --}}";
    }
</script>

@stop