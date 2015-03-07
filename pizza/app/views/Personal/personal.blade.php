@extends('...layout')

@section('head')

{{ HTML::style('css/chosen.css') }}

@section('content')

<h2>Personalverwaltung</h2>
<div style="padding: 40px 30px;">

    <div class="chosen-container chosen-container-multi">
        <label>Personal - Name:</label>
        <ul class="chosen-choices">
            <li class="search-field">
                <input type="text" id="tels" class="default" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /><button type="button" id="aufk" onclick="toggle(this);"/><span id="aufks" class="glyphicon glyphicon-chevron-down"></span>
            </li>
        </ul>
    </div>

    <div class="contacts" style="float:right; height: 100px; width: 100%;">
        <div style="height: 200px; z-index:99; position: relative;">
            <table  width="100%" class="table1" id="table1" style="display: none;">
                <thead style="display: table-header-group;">
                    <tr>
                        <th id="toggA" onclick="toggle(this);" style="display: none;"><b>Aufklappen</b></th>
                        <th id="toggT">Telefon</th>
                        <th id="toggN">Name</th>
                        <th id="toggS">Straße</th>
                    </tr>
                </thead>
                <tbody style="overflow-y: auto; max-height: 200px; display: inline-block; width: 300%;">
                </tbody>
             </table>
        </div>
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