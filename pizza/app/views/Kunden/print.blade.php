@extends('...layout')

@section('content')

<h2>Kundendruck</h2>

<div style="padding: 0 30px;">
    <fieldset>
        <input type="radio" name="print" id="listprint" checked> <label for="listprint">Kundenliste drucken</label><br />
        <input type="radio" name="print" id="serienprint"> <label for="serienprint">Serienbriefdatei erstellen</label><br />
    </fieldset>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Von</th>
                <th>Bis</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Telefonnr.:</td>
                <td><input type="text" id="vTel"></td>
                <td><input type="text" id="bTel"></td>
            </tr>
            <tr>
                <td>Name.:</td>
                <td><input type="text" id="vName"></td>
                <td><input type="text" id="bName"></td>
            </tr>
            <tr>
                <td>Jahres-Umsatz:</td>
                <td><input type="text" id="vJum"></td>
                <td><input type="text" id="bJum"></td>
            </tr>
            <tr>
                <td>Letzte-Bestellg.:</td>
                <td><input type="text" id="vLbe"></td>
                <td><input type="text" id="bLbe"></td>
            </tr>
            <tr>
                <td>Anzahl-Bestellg.:</td>
                <td><input type="text" id="vAbe"></td>
                <td><input type="text" id="bAbe"></td>
            </tr>
        </tbody>
    </table>
    <button onclick="javscript:printList()" class="btn btn-lg btn-warning" ><span class="glyphicon glyphicon-print"></span> Drucken</button>
</div>
<form style="display: hidden" action="/api/makePrintJob?htmlToPrint" method="POST" id="form">
  <input type="hidden" id="htmlToPrint" name="htmlToPrint" value=""/>
</form>
<script language="javascript">
    function printList()
    {
        if ($('#listprint').is(':checked'))
        {
            var htmlToPrint = "<h3>Kundenliste</h3>"; //Heading

            var d = new Date();
            htmlToPrint += "<p><i>"+d.getDate()+"."+d.getMonth()+"."+d.getFullYear()+"</i></p>";    //Date
            htmlToPrint += "<hr>";   //Vertical Lines

            var table = document.createElement("table");    //Create Data Table
            var tableHeader = table.createTHead();  //Add Table Header

            var name = document.createElement('th');    //Add name heading
            name.innerText = "Name";
            tableHeader.appendChild(name);

            var adr = document.createElement('th');    //Add adr heading
            adr.innerText = "Adresse";
            tableHeader.appendChild(adr);

            var tel = document.createElement('th');    //Add tel heading
            tel.innerText = "Telefonnummer";
            tableHeader.appendChild(tel);

            var abe = document.createElement('th');    //Add abe heading
            abe.innerText = "Anzahl Bestellungen";
            tableHeader.appendChild(abe);

            var lbe = document.createElement('th');    //Add lbe heading
            lbe.innerText = "Letzte Bestellung";
            tableHeader.appendChild(lbe);

            var jsu = document.createElement('th');    //Add jsu heading
            jsu.innerText = "Jahresumsatz";
            tableHeader.appendChild(jsu);

            var rab = document.createElement('th');    //Add rab heading
            rab.innerText = "Rabatt";
            tableHeader.appendChild(rab);

            htmlToPrint += table.outerHTML; // Add Table to Printed String


            $('#htmlToPrint').val(htmlToPrint);
            $('#form').submit();
        }
        else if ($('#serienprint').is(':checked'))
        {

        }
        else
        {
            alert('Bitte wählen Sie aus, ob Sie einen Serienbrief oder eine Kundenliste drucken wollen!')
        }
    }
</script>
<style type="text/css">
    TABLE TBODY TR TD INPUT
    {
        width: 10em;
    }
</style>
@stop