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
    <tbody class="monatsstats">
    </tbody>
</table>
<br/>
<a href="/"><button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>



<script language="javascript">

    function selectyear(e)
    {

        if (e.keyCode == 13) {
        var year = document.getElementById('year').value;

            var xhr = new XMLHttpRequest();
            (xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    var years = JSON.parse(xhr.responseText);
                    alert(years.length);
                    if (years.length == 1)
                        document.getElementById('year').style.backgroundColor = "#3F3";

                    else if (years.length == 0)
                        document.getElementById('year').style.backgroundColor = "red";

                    if (years.length<15000)
                    {
                        var table = document.getElementById('table1');
                        while(table.hasChildNodes())
                        {
                           table.removeChild(table.firstChild);
                        }
                        var header = table.createTHead();

                        for (var i = 0;i<years.length;i++)
                        {
                            var row = table.insertRow(0);

                            var artCell = row.insertCell(0);
                            artCell.innerText = years[i]['ANR'];

                            var yearCell = row.insertCell(1);
                            yearCell.innerText = years[i]['JJJJ'];

                            var janCell = row.insertCell(1);
                            janCell.innerText = years[i]['M01'];

                            var febCell = row.insertCell(1);
                            febCell.innerText = years[i]['M02'];

                            var marCell = row.insertCell(1);
                            marCell.innerText = years[i]['M03'];

                            var aprCell = row.insertCell(1);
                            aprCell.innerText = years[i]['M04'];

                            var maiCell = row.insertCell(1);
                            maiCell.innerText = years[i]['M05'];

                            var junCell = row.insertCell(1);
                            junCell.innerText = years[i]['M06'];

                            var julCell = row.insertCell(1);
                            julCell.innerText = years[i]['M07'];

                            var augCell = row.insertCell(1);
                            augCell.innerText = years[i]['M08'];

                            var sepCell = row.insertCell(1);
                            sepCell.innerText = years[i]['M09'];

                            var oktCell = row.insertCell(1);
                            oktCell.innerText = years[i]['M10'];

                            var novCell = row.insertCell(1);
                            novCell.innerText = years[i]['M11'];

                            var dezCell = row.insertCell(1);
                            dezCell.innerText = years[i]['M12'];

                            var sumCell = row.insertCell(1);
                            sumCell.innerText = "Summe";

                            row.className = "tablerow";
                        }

                        header.innerHTML = "<tr><th>Artikel</th><th>Jahr</th><th>Jän</th><th>Feb</th><th>Mär</th><th>Apr</th><th>Mai</th><th>Jun</th><th>Jul</th>" +
                         "<th>Aug</th><th>Sep</th><th>Okt</th><th>Nov</th><th>Dez</th><th>Summe</th></tr>";
                    }
                }
            })
            xhr.open('GET', '/api/searchYear?year=' + year, true);
            xhr.send(null);

        }
    }
</script>

@stop