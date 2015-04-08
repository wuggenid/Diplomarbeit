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
                    <tr class="tablerow" onclick="javascript:createrow('{{$bon->TYP}}','{{$bon->EP}}')">
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
        <button type="button" class="btn btn-lg btn-danger" onclick="javascript:deleterow()"><span class="glyphicon glyphicon-trash"></span> Löschen </button>
        <button type="button" class="btn btn-lg btn-success" onclick="javascript:savedata()"><span class="glyphicon glyphicon-save"></span> Speichern </button>
    </div>



<script language="JavaScript">

    var table = document.getElementById('table1');
    var rowcount = 0;
    var idsetter = 1;

    while(table.hasChildNodes())
    {
        table.removeChild(table.firstChild);
    }

    var header = table.createTHead();
    header.innerHTML = "<tr><th>Datum</th><th>Typ</th><th>E-Preis</th><th>Stück</th><th>Summe</th><th>Löschen</th></tr>";

    function createrow(typ, ep)
    {
        var row = table.insertRow(rowcount+1);

        row.className = "bonrow";
        row.id = "row"+idsetter;
        alert("row" + row.id);

        var datumCell = row.insertCell(0);
        date = new Date().toLocaleString();
        datumCell.innerText = date;

        var artCell = row.insertCell(1);
        artCell.innerText = typ;

        var epreisCell = row.insertCell(2);
        epreisCell.innerText = ep + ' €';

        var input = document.createElement("input");
        input.type = "text";
        input.id = "input"+idsetter;

        var stCell = row.insertCell(3);
        stCell.appendChild(input);

        document.getElementById(input.id).focus();
        alert("inid" + input.id);
        document.getElementById(input.id).onkeydown = function (e) {
            if (e.which == 13)
                sumit(input.id, input.value, ep, row);
        };

        rowcount++;
        idsetter++;
    }

    function sumit(iid, stueck, ep, row)
    {
        if (stueck >= 0) {
            var id = iid.split("input");
            //mit hilfe input.id id wird die tabellenreihe rausgesucht - FALSCH
            if(document.getElementById('table1').rows[id[1]].cells.length == 4) {
                var sumCell = row.insertCell(4);
                sumCell.innerText = ep * stueck + ' €';

                // Create Delete Button
                var deleteCell = row.insertCell(5);
                var cbutton = document.createElement("button");
                cbutton.className = "btn btn-lg btn-danger";
                cbutton.innerHTML = 'Löschen';
                cbutton.style.maxHeight = "35px";
                cbutton.style.fontSize = "15px";
                cbutton.style.padding = "5px";
                cbutton.id = "b"+id[1];
                alert(cbutton.id);
                cbutton.setAttribute( "onClick", 'javascript: deleterow('+id[1]+');');
                deleteCell.appendChild(cbutton);
            }
            else {
                document.getElementById('table1').rows[id[1]].cells[4].innerText = ep * stueck + ' €';
            }

        }

    }

    function selectrow()
    {

    }

    function savedata()
    {

    }

    function deleterow(bid)
    {
        document.getElementById("table1").deleteRow(bid);
        rowcount--;
        alert("rc" +rowcount);
    }







</script>

@stop