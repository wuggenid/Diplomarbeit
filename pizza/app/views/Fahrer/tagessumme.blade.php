@extends('...layout')

@section('content')

<h2>Tagessumme</h2>

<select id="dates" size="10" onchange="dateSelect(this.selectedIndex);" style="float: right; width: 15em;">
    @foreach($dates as $date)
        <option>{{date('d.m.Y',strtotime($date->DAT))}}</option>
    @endforeach
</select>
<select id="fahrer" size="10" onchange="fahrerSelect(this.selectedIndex);" style="float: right; width: 15em; display: none;">
    @foreach($personal as $person)
        <option pkz="{{$person['PKZ']}}" vnam="{{$person['VNAM']}}" nnam="{{$person['NNAM']}}">{{$person['VNAM']." ".$person['NNAM']." ".$person['PKZ']}}</option>
    @endforeach
</select>
<div style="padding: 5px 30px;">
    <table>
        <tbody>
            <tr>
                <th>R-Datum:</th>
                <th><input onfocus="javscript:dateFocus()" type="text" id="date" /></th>
            </tr>
            <tr>
                <th>Fahrer-Nr.:</th>
                <th><input onfocus="javascript:fahrerFocus()" type="text" id="pkz" /></th>
            </tr>
            <tr>
                <th>Fahrer:</th>
                <th><input type="text" id="fname" disabled/></th>
            </tr>
        </tbody>
    </table>
    <button onclick="javascript:print()" id="btn_drucken" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-print"></span> Drucken</button>
</div>

<style type="text/css">
    TABLE TBODY TR TH INPUT
    {
        width: 10em;
    }
</style>
<script>
    function print()
    {
        var htmlToPrint = "<h3>Fahrertagessummen</h3>"; //Heading
        htmlToPrint += "<hr><hr><p><i>";   //Vertical Lines
        var d = new Date();
        htmlToPrint += d.getDate()+"."+d.getMonth()+"."+d.getFullYear();    //Date
        htmlToPrint += "</i> <b> Fahrer: </b>";
        htmlToPrint += $('#fname').val();+"</p><br /><br />";   //Fahrer

        var table = document.createElement("table");    //Create Data Table
        var tableHeader = table.createTHead();  //Add Table Header

        var date = document.createElement('th');    //Add date heading
        date.style.width = "7em";
        date.innerText = "R-Datum";
        tableHeader.appendChild(date);

        var number = document.createElement('th');    //Add number heading
        number.style.width = "7em";
        number.innerText = "R-Nr.";
        tableHeader.appendChild(number);

        var time = document.createElement('th');    //Add time heading
        time.style.width = "7em";
        time.innerText = "R-Zeit";
        tableHeader.appendChild(time);

        var name = document.createElement('th');    //Add name heading
        name.style.width = "7em";
        name.innerText = "Name";
        tableHeader.appendChild(name);

        var address = document.createElement('th');    //Add address heading
        address.style.width = "7em";
        address.innerText = "Adresse";
        tableHeader.appendChild(address);

        var sum = document.createElement('th');    //Add sum heading
        sum.style.width = "7em";
        sum.innerText = "R-Betrag";
        tableHeader.appendChild(sum);

        var tableBody = document.createElement("tbody");
        /*for (var i = 0;i<)
        var row = tableBody.insertRow(0);
        var cell = row.insertCell(0);*/
        table.appendChild(tableBody);

        htmlToPrint += table.outerHTML;
        window.location.href = '/api/makePrintJob?htmlToPrint='+htmlToPrint;
    }
    $('#pkz').keydown(function(e)
    {
        if (e.which == 13)
        {
            if ($("[pkz="+$(this).val()+"]").val()) //If there is a driver with this pkz
            {
                var selectedOption = $("[pkz="+$(this).val()+"]")[0];
                var fahrerName = selectedOption.getAttribute('vnam') + " " + selectedOption.getAttribute('nnam');
                document.getElementById('fname').value = fahrerName;
            }
            else
            {
                alert('Dieser Fahrer wurde leider nicht gefunden! Bitte geben sie ein anderes Kürzel ein oder wählen Sie eines aus der Liste aus.');
            }
        }
    });
    function dateSelect(selectedIndex)
    {
        document.getElementById('date').value = document.getElementById('dates').options[selectedIndex].text;
    }
    function fahrerSelect(selectedIndex)
    {
        var selectedOption = document.getElementById('fahrer').options[selectedIndex];
        document.getElementById('pkz').value = selectedOption.getAttribute('pkz');
        var fahrerName = selectedOption.getAttribute('vnam') + " " + selectedOption.getAttribute('nnam');
        document.getElementById('fname').value = fahrerName;
    }
    function dateFocus()
    {
        document.getElementById('fahrer').style.display = "none";
        document.getElementById('dates').style.display = "";
    }
    function fahrerFocus()
    {
        document.getElementById('dates').style.display = "none";
        document.getElementById('fahrer').style.display = "";
    }
</script>

@stop