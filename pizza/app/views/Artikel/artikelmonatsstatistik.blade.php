@extends('...layout')

@section('content')

<h2>Artikelmonatsstatistik</h2>
<label>Jahr</label>
<input type="text" id="year" class="default" onkeydown="selectyear(event)" />

<table class="table table-striped table-bordered" id="table1">
    <thead>

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

                            /*var annr = years[i]['ANR'];
                            var artik = "";
                            findartikel(annr, function(nam) {
                                artik = nam;
                                artCell.innerText = artik;
                                });
                                */

                            artCell.innerText = years[i]['ANR'];

                            var yearCell = row.insertCell(1);
                            yearCell.innerText = years[i]['JJJJ'];

                            var janCell = row.insertCell(2);
                            janCell.innerText = years[i]['M01'];

                            var febCell = row.insertCell(3);
                            febCell.innerText = years[i]['M02'];

                            var marCell = row.insertCell(4);
                            marCell.innerText = years[i]['M03'];

                            var aprCell = row.insertCell(5);
                            aprCell.innerText = years[i]['M04'];

                            var maiCell = row.insertCell(6);
                            maiCell.innerText = years[i]['M05'];

                            var junCell = row.insertCell(7);
                            junCell.innerText = years[i]['M06'];

                            var julCell = row.insertCell(8);
                            julCell.innerText = years[i]['M07'];

                            var augCell = row.insertCell(9);
                            augCell.innerText = years[i]['M08'];

                            var sepCell = row.insertCell(10);
                            sepCell.innerText = years[i]['M09'];

                            var oktCell = row.insertCell(11);
                            oktCell.innerText = years[i]['M10'];

                            var novCell = row.insertCell(12);
                            novCell.innerText = years[i]['M11'];

                            var dezCell = row.insertCell(13);
                            dezCell.innerText = years[i]['M12'];

                            var sumCell = row.insertCell(14);
                            sumCell.innerText = years[i]['MSU'];

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

    function findartikel(anr, callback)
    {
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                var art = JSON.parse(xhr.responseText);
                if (art.length == 1) {
                    var artikelname = art[0]['A0'];
                    callback(artikelname);
                    }
            }

        })
        xhr.open('GET', '/api/getArtikel?artikel=' + anr, true);
        xhr.send(null);
    }
</script>

@stop