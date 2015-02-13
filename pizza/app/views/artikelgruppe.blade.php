@extends('layout')

@section('content')

<h2>Artikelgruppenverwaltung</h2>
<div style="padding: 5px 30px;">

    <div style="width:35%; float: left; padding: 10% 5% 0 0;">
        <ul id="contactform">
            <li>
                <label for="name"> Artikelgruppen-Nr </label><br/>
                <span class="fieldbox"><input type="text" name="artgnr" id="artgnr" value="" /></span>
            </li>
            <li>
                <label for="email"> Artikelgruppen-Bezeichnung </label><br/>
                <span class="fieldbox"><input type="text" name="artgrubez" id="artgrubez" value="" /></span>
            </li>
        </ul>
    </div>


    <div style="width:65%; float: right; padding-top: 20px; padding-left: 5%; ">
        <h3>Suchkriterium</h3>

        <table class="scroll" style="width: 63%;">
            <thead>
                <tr>
                    <th id="aid" style="text-align: left;">Gruppen-Nr</th>
                    <th id="abez" style="text-align: left;">Gruppenbezeichnung</th>
                </tr>
            </thead>
        </table>

        <table id="artikelgruppe" style="height: 300px; width: 63%; overflow-y: auto;">
            <tbody>
                <?php $xag = xag::orderby('AGNR')->get(); ?>

                @foreach($xag as $key => $ag)
                     <tr class="tablerow" id="{{$ag->AGNR}}" onclick="artgnr.value = '{{$ag->AGNR}}'; artgrubez.value = '{{$ag->AGBEZ}}'; newgarticle=1;">
                         <td style="padding-left: 10%;">{{$ag->AGNR}}</td>
                         <td style="width: 500px;">{{$ag->AGBEZ}}</td>
                     </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>



<div style="clear: both;">
    <br/><br/>
    <button style="width: 12em;" onClick="javascript:newarticle()" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Neue Artikelgruppe </button>

    {{-- Form::open(array('url' => "/Artikel/$article->(artnr.value)" , 'method' => 'delete')) --}}
        <button style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Artikelgruppe löschen </button>
    {{-- Form::close() --}}

    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-stats"></span> Artikelgruppenliste drucken</button>
    <br/><br/>
    <a href="/"><button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <button style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Artikelgruppe speichern</button>
    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Rückgängig Änderung </button>
    <br/><br/>
</div>


<script language="javascript">

    var newgarticle = 0;

    function newgarticle()
    {
        artnr.value = artbez.value = artgru.value = mwst.value = ''; epreis.value = vmenge.value = '0';
        newgarticle = 1;
    }

    function deletearticle(id)
    {
        alert(id);
        //**window.location.href = "{{-- url('/Artikel' . $article->id . 'destroy') --}}";
    }

    function savearticle()
    {

    }

</script>

@stop