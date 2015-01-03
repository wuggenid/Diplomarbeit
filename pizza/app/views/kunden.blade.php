@extends('layout')

@section('content')

<h2>Kundenstammverwaltung</h2>
<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <h3>Kunde</h3>
        <label style="float: right;" >Telefon/Name:<input type="text" id="tel" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /></label>
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

@stop