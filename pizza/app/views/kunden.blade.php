@extends('layout')

@section('content')

<h2>Kundenstammverwaltung</h2>
<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <h3>Kunde</h3>
    <div id="right" style="float: right;">
        <label style="float: left; background-color: orange;" >Telefon/Name:<input type="text" id="tel" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /></label><br /><br />
        <label style="float: left;" id="bestjahr" >Bestellungen/Jahr: </label><br /><br />
        <label style="float: left;" id="letztebest" >Letzte Bestellung: </label><br /><br />
        <label style="float: left;" id="umsatzjahr">Umsatz/Jahr: </label>
    </div>
        <div style="width:40%; float: left;">
            <ul id="contactform">
                <li>
                    <label for="name"> Vorname</label><br/>
                    <span class="fieldbox"><input type="text" name="vname" id="vname" /></span>
                </li>
                <li>
                    <label for="name"> Nachname</label><br/>
                    <span class="fieldbox"><input type="text" name="nname" id="nname" /></span>
                </li>
                <li>
                    <label for="email"> Telefon</label><br/>
                    <span class="fieldbox"><input type="text" name="tel" id="tel" value="{{$tel}}"/></span>
                </li>
                <li>
                    <label for="contact"> Adresse</label><br/>
                    <span class="fieldbox"><input type="text" name="add" id="add" /></span>
                </li>
                <li>
                    <label for="contact"> Ort</label><br/>
                    <span class="fieldbox"><input type="text" name="ort" id="ort" /></span>
                </li>
                <li>
                    <label for="contact"> Information 1:</label><br/>
                    <span class="fieldbox"><input type="text" name="if1" id="if1" /></span>
                </li>
                <li>
                    <label for="contact"> Information 2:</label><br/>
                    <span class="fieldbox"><input type="text" name="if2" id="if2" /></span>
                </li>
                <li>
                    <label for="contact"> Kundenrabbat(10% = 0,1):</label><br/>
                    <span class="fieldbox"><input type="text" name="rabbat" id="if2" /></span>
                </li>
            </ul>
        </div>
        <div style="width: 50%">
            <table border="1" style="float: left;">
                <tbody style="background-color: #ffffff;">
                    <tr style="background-color: #ffffff;">
                        <td><a href="/Kunden/create"><input type="button" class="btn btn-lg btn-default" value="Neuer Kunde" /></a></td>
                        <td><a href="/Kunden/delete"><input type="button" class="btn btn-lg btn-default" value="Kunden löschen" /></a></td>
                        <td><a href=""><input type="button" class="btn btn-lg btn-default" value="Etikettendruck"></a></td>
                    </tr>
                    <tr style="background-color: #ffffff;">
                        <td><a href=""><input type="button" class="btn btn-lg btn-default" value="Rückgängig" /></a></td>
                        <td><a href="/Kunden/update"><input type="button" class="btn btn-lg btn-default" value="Kunden speichern" /></a></td>
                        <td><a href=""><input type="button" class="btn btn-lg btn-default" value="Kundenliste drucken" /></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
@stop