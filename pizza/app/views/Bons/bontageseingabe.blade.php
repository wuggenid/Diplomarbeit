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
    var createdrow = false;

    while(table.hasChildNodes())
    {
        table.removeChild(table.firstChild);
    }
    var header = table.createTHead();
    header.innerHTML = "<tr><th>Datum</th><th>Typ</th><th>E-Preis</th><th>Stück</th><th>Summe</th><th>Löschen</th></tr>";
    var idsetter = 1;
    var numrow = 0;
    var data = [];

    function createrow(typ, ep)
    {
        numrow = document.getElementById('table1').rows.length;
        var row = table.insertRow(numrow);
        row.className = "bonrow";

        var datumCell = row.insertCell(0);
        date = new Date().toLocaleString();
        datumCell.innerText = date;

        var artCell = row.insertCell(1);
        artCell.innerText = typ;

        var epreisCell = row.insertCell(2);
        epreisCell.innerText = ep + ' €';

        var input = document.createElement("input");
        input.type = "text";
        input.id = idsetter;
        //alert("i/input.id: " + i);
        var stCell = row.insertCell(3);
        stCell.appendChild(input);

        document.getElementById(input.id).focus();

        document.getElementById(input.id).onkeydown = function (e) {
            if (e.which == 13) {
                //alert("input.id: " + input.id);
                var stueck = document.getElementById(input.id).value;
                if (stueck >= 0) {
                    alert(document.getElementById('table1').rows[numrow].cells.length);
                    if(document.getElementById('table1').rows[numrow].cells.length == 4) {
                        var sumCell = row.insertCell(4);
                        sumCell.innerText = ep * stueck + ' €';

                        data.push([date, typ, ep, stueck, sumCell.innerText]);
                        createdrow = true;

                        // Create Delete Button
                        var deleteCell = row.insertCell(5);
                        var cbutton = document.createElement("button");
                        cbutton.className = "btn btn-lg btn-danger";
                        cbutton.innerHTML = 'Löschen';
                        cbutton.style.maxHeight = "35px";
                        cbutton.style.fontSize = "15px";
                        cbutton.style.padding = "5px";
                        cbutton.id = "b"+idsetter;
                        cbutton.setAttribute( "onClick", 'javascript: deleterow('+idsetter+');');
                        deleteCell.appendChild(cbutton);
                    }
                    else {
                        var nsum = document.getElementById('table1').rows[numrow].cells[4].innerText = ep * stueck + ' €';
                        data.push([date, typ, ep, stueck, nsum]);
                    }
                }

                else {
                    alert("Bitte eine Zahl eingeben!");
                }

            }
        };

        idsetter++;

        document.getElementById(numrow).onfocus = function (e) {
            alert("TF" + input.id);
        }

    }

    function savedata()
    {
        //Speichern
        if(createdrow == true)
        {
            window.location.href = "/Bons/Tageseingabe/store"
            + "?data=" + data;

        }
        else
            alert("Noch keine Bons erstellt!");
    }

    function deleterow(buttonid)
    {
        idsetter--;

        document.getElementById("table1").deleteRow(buttonid);
        //alert("buttonid" + buttonid);
        //alert(document.getElementById('table1').rows.length);

        if(document.getElementById('table1').rows.length != buttonid)
            idsetter = document.getElementById('table1').rows.length+1;

        //alert("i" + i);


    }






</script>

@stop