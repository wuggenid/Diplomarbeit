@extends('layout')

@section('content')

<h2>Kundenstammverwaltung</h2>

<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <h3>Kunde</h3>
    <div id="right" style="float: right;">
        <label style="float: left; background-color: orange;" >Lieferantenauswahl:<input type="text" id="tel" oninput="javascript:telChange()" onkeydown="javascript:telKeyPress(this)" /></label><br /><br />
        <label style="float: left;" id="bestjahr" >Bestellungen/Jahr: </label><br /><br />
        <label style="float: left;" id="letztebest" >Letzte Bestellung: </label><br /><br />
        <label style="float: left;" id="umsatzjahr">Umsatz/Jahr: </label>
    </div>
        <div style="width:40%; float: left;">
            <ul id="contactform">
                <li>
                    <label for="name"> Nummer</label><br/>
                    <span class="fieldbox"><input type="text" name="nummer" id="vname" /></span>
                </li>
                <li>
                    <label for="name"> Name</label><br/>
                    <span class="fieldbox"><input type="text" name="name" id="name" /></span>
                </li>
                <li>
                    <label for="email"> Straße</label><br/>
                    <span class="fieldbox"><input type="text" name="add" id="add" /></span>
                </li>
                <li>
                    <label for="contact"> Ort</label><br/>
                    <span class="fieldbox"><input type="text" name="ort" id="ort" /></span>
                </li>
                <li>
                    <label for="contact"> Ansprechperson 1</label><br/>
                    <span class="fieldbox"><input type="text" name="ap1" id="ap1" /></span>
                </li>
                <li>
                    <label for="contact"> Telefon 1:</label><br/>
                    <span class="fieldbox"><input type="text" name="tel1" id="tel1" /></span>
                </li>
                <li>
                    <label for="contact"> Letzter Kontakt:</label><br/>
                    <span class="fieldbox"><input type="text" name="if2" id="if2" /></span>
                </li>
                <li>
                    <label for="contact"> Memo:</label><br/>
                    <span class="fieldbox"><input type="text" name="rabbat" id="rabbat" /></span>
                </li>
            </ul>
        </div>
        <div style="width: 50%">
            <table border="1" style="float: left;">
                <tbody style="background-color: #ffffff;">
                    <tr style="background-color: #ffffff;">
                        <td><input type="button" onclick="javascript:newClick()" class="btn btn-lg btn-default" value="Neuer Lieferant" /></td>
                        <td><a href="/Lieferanten/delete"><input type="button" class="btn btn-lg btn-default" value="Lieferanten löschen" /></a></td>
                        <td><input type="button" class="btn btn-lg btn-default" value="Etikettendruck"></td>
                    </tr>
                    <tr style="background-color: #ffffff;">
                        <td><a href=""><input type="button" class="btn btn-lg btn-default" value="Rückgängig" /></a></td>
                        <td><input type="button" onclick="javascript:updateClick()" class="btn btn-lg btn-default" value="Lieferanten speichern" /></td>
                        <td><a href=""><input type="button" class="btn btn-lg btn-default" value="Lieferantenliste drucken" /></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>

@stop