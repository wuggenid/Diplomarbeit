@extends('...layout')

@section('content')

    <div class="content">

        <h2>Bons-Tageseingabe</h2>

        <div style="width:65%; float: left; padding-top: 20px; padding-left: 5%; ">
            <table class="artikeltabelle" style="width: 100%;">
                <thead>
                <tr>
                    <th width="40%" id="aid" style="padding-left: 5%;">Tel-Nr</th>
                    <th width="40%" id="abez">Bezeichnung</th>
                    <th >Einzelpreis</th>
                </tr>
                </thead>
            </table>

            <table id="artikelgruppe" style="max-height: 300px; width: 100%; overflow-y: auto;">
                <tbody>
                @foreach($bons as $key => $bon)
                    <tr class="tablerow" onclick="javascript:createrow()">
                        <td>{{$bon->TEL}}</td>
                        <td>{{$bon->TYP}}</td>
                        <td>{{$bon->EP}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br/><br/><br/><br/><br/>
        <div style="padding-top: 200px;">
            <table class="table table-striped table-bordered" id="table1">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>



        <br /><br /><br /><br /><br />
        <a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
        <button type="button" class="btn btn-lg btn-danger" onclick="javascript:delete()"><span class="glyphicon glyphicon-trash"></span> Löschen </button>
        <button type="button" class="btn btn-lg btn-success" onclick="javascript:save()"><span class="glyphicon glyphicon-save"></span> Speichern </button>
    </div>



<script language="JavaScript">

    var table = document.getElementById('table1');
    while(table.hasChildNodes())
    {
        table.removeChild(table.firstChild);
    }
    var header = table.createTHead();
    header.innerHTML = "<tr><th>Datum</th><th>Typ</th><th>E-Preis</th><th>Stück</th><th>Summe</th></tr>";
    var i = 1;

    function createrow()
    {
        var row = table.insertRow(i);

        var datumCell = row.insertCell(0);
        datumCell.appendChild(document.createElement("input"));

        var artCell = row.insertCell(1);
        artCell.appendChild(document.createElement("input"));

        var epreisCell = row.insertCell(2);
        epreisCell.appendChild(document.createElement("input"));

        var stCell = row.insertCell(3);
        stCell.appendChild(document.createElement("input"));

        var sumCell = row.insertCell(4);
        sumCell.appendChild(document.createElement("input"));

        row.className = "bonrow";
        i++;
    }
</script>

@stop