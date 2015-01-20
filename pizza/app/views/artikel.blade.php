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


    <div style="width:58%; float: right; padding-top: 20px; padding-left: 5%; ">
        <h3>Suchkriterium</h3>

        <?php $artikels = xartikel::orderby('ANR')->get(); ?>

        <select name="suchkriterium" id="suchkriterium" size="10">
            @foreach($artikels as $key => $artikel)

            <option id="{{$artikel['ANR']}}" onClick="artnr.value = '{{$artikel['ANR']}}';
                            artbez.value = '{{$artikel['A0']}}';
                            artgru.value = '{{$artikel['AG']}}';
                            epreis.value = '{{$artikel['CB']}}';
                            mwst.value = '1';
                            vmenge.value = '{{$artikel['VGS']}}';">
            {{$artikel['ANR']}} | {{$artikel['A0']}}

            </option>
            @endforeach
        </select>

    </div>
</div>



<div style="clear: both;">
    <br/><br/>
    <button onClick="artnr.value = artbez.value = artgru.value = mwst.value = ''; epreis.value = vmenge.value = '0';" class="bbutton"> Neuer Artikel </button>

    {{ Form::open(array('url' => "/Artikel/$artikel->(artnr.value)" , 'method' => 'delete')) }}
        <button class="bbutton"> Artikel löschen </button>
    {{ Form::close() }}

    <button class="bbutton"> Artikelmonatsstatistik </button>
    <br/><br/>
    <button class="bbutton"> Rückgängig Änderung </button>
    <button class="bbutton"> Artikel speichern </button>
    <button class="bbutton"> Artikelliste drucken </button>
    <br/><br/>
    <a href="/"> <button class="bbutton"> Ende </button></a>
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

    window.location.href = "{{ url('/Artikel' . $artikel->id . 'destroy') }}";


}
</script>

@stop