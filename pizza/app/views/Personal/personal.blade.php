@extends('...layout')

@section('head')

@section('content')

<h2>Personalverwaltung</h2>
<div style="padding: 10px 30px;">

    <div style="width:65%; float: left; padding: 50px 5%; ">
        <div class="chosen-container chosen-container-multi">
            <label>Personal - Name:</label>
            <ul style="list-style: none;" class="chosen-choices">
                <li class="search-field">
                    <input type="text" id="tels" class="default" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /><button type="button" id="aufk" onclick="toggle(this);"/><span id="aufks" class="glyphicon glyphicon-chevron-down"></span>
                </li>
            </ul>
        </div>

        <table class="scroll" style="width: 100%;">
            <thead>
                <tr>
                    <th width="25%" id="aid" style="text-align: left; padding-left: 5%;">Art-Nr</th>
                    <th id="abez" style="text-align: left;">Bezeichnung</th>
                    <th style="text-align: left;">Straße</th>
                </tr>
            </thead>
        </table>
        <table id="artikel" style="height: 300px; width: 100%; overflow-y: auto; display: block;">
            <tbody>
                @foreach($personal as $key => $person)
                     <tr class="tablerow">
                         <td style="text-align: left; padding-left: 5%;">{{$person->PKZ}}</td>
                         <td style="text-align: left; width: 62%; padding-left: 20%;">{{$person->VNAM}} {{$person->NNAM}}</td>
                         <th style="text-align: left; width: 38%;">{{$person->PSTR}}</th>
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div style="width:45%; float: left;">
        <ul id="contactform">
            <li>
                <label for="name"> Vorname </label><br/>
                <span class="fieldbox"><input type="text" name="vname" id="vname"/></span>
            </li>
            <li>
                <label for="name"> Nachname </label><br/>
                <span class="fieldbox"><input type="text" name="nname" id="nname"/></span>
            </li>
            <li>
                <label for="name"> Kurzzeichen </label><br/>
                <span class="fieldbox"><input type="text" name="nname" id="nname"/></span>
            </li>
            <li>
                <label for="contact"> Adresse</label><br/>
                <span class="fieldbox"><input type="text" name="add" id="add"/></span>
            </li>
            <li>
                <label for="contact"> Ort</label><br/>
                <span class="fieldbox"><input type="text" name="ort" id="ort"/></span>
            </li>
            <li>
                <label for="email"> Telefon</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Sozialversicherungs-Nummer</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Geburtstag</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
        </ul>
    </div>


    <div style="width:45%; float: right;">
        <ul id="contactform">
            <li>
                <label for="email"> Eintrittsdatum</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Austrittsdatum</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Lohn/Gehalt</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Kontonummer</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Bankverbindung</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Urlaubstage</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Kranktage</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="msg"> Memo</label><br/>
                <span class="msgbox"><textarea class="area" id="msg" name="msg" rows="8" cols="30" style="resize: none;"></textarea></span>
            </li>
        </ul>
    </div>
</div>


<div style="clear: both;">
    <br/><br/>
    <button onclick="javascript:deletearticle()" style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Personal löschen </button>
    <button onclick="javascript:newarticle()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Neues Personal </button>
    <a href="/Artikel/Artikelmonatsstatistik"><button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Etikettendruck </button></a>
    <br/><br/>
    <a href="/"><button style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück </button></a>
    <button onclick="javascript:savearticle()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Personal speichern</button>
    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Personalliste drucken </button>
    <br/><br/>
</div>


@stop