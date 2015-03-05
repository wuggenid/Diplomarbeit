@extends('...layout')

@section('content')

<h2>Artikelmonatsstatistik</h2>
<input type="text" id="year" class="default" onkeydown="selectyear(event)" />

<table class="table table-striped table-bordered" id="table1">
    <thead>
        <tr>
            <th>Artikel</th>
            <th>Jahr</th>
            <th>Jän</th>
            <th>Feb</th>
            <th>Mär</th>
            <th>Apr</th>
            <th>Mai</th>
            <th>Jun</th>
            <th>Jul</th>
            <th>Aug</th>
            <th>Sep</th>
            <th>Okt</th>
            <th>Nov</th>
            <th>Dez</th>
            <th style="width: 20%;">Summe</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<br/>
<a href="/"><button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>


<style type="text/css">
    tbody tr th input
    {
        width: 100%;
    }
</style>

<script language="javascript">
    function selectyear(e)
    {
        if (e.keyCode == 13) {
            var year = document.getElementById('year').value;
            alert(year);


            var xhr = new XMLHttpRequest();
                    var numbers = JSON.parse(xhr.responseText);
                    var table = document.getElementById('table1');
                    while(table.hasChildNodes())
                    {
                       table.removeChild(table.firstChild);
                    }
                    var header = table.createTHead();

                    for (var i = 0;i<numbers.length;i++)
                    {
                        var row = table.insertRow(0);

                        var artCell = row.insertCell(0);
                        artCell.innerText = numbers[i]['ANR'];

                        var nameCell = row.insertCell(-1);
                        nameCell.innerText = numbers[i]['M01'];

                        var febCell = row.insertCell(-1);
                        febCell.innerText = numbers[i]['M02'];
                    }
                    header.innerHTML = "<tr><th>Aufklappen</th><th>Telefon</th><th>Name</th><th>Straße</th></tr>";

            xhr.open('GET', '/api/searchyear?year=' + year, true);
            xhr.send(null);

        }
    }
</script>

@stop