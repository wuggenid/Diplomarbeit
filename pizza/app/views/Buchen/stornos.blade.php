@extends('layout')

@section('content')

<h2>Stornos</h2>
<div id="right" style="float: right; width: 58%; padding-top: 20px">

    <div class="chosen-container chosen-container-multi">
        <p style="float: right;">Storno: <input type="checkbox" id="cb_storno" /></p>
        <label>Rechnungsnummer:</label>
        <ul class="chosen-choices" style="list-style-type: none;">
            <li class="search-field">
                <input type="text" id="rnr_search" class="default" oninput="javascript:rnr_SearchInput(this)" onkeydown="javascript:rnrSearchKeyPress(this)" /><button type="button" id="aufk" onclick="toggle(this);"/><span id="aufks" class="glyphicon glyphicon-chevron-down"></span>
            </li>
        </ul>
    </div>

    <div class="contacts" style="float:right; height: 300px; width: 100%;">
        <div style="height: 200px;">
                <table  width="100%" class="table1" id="table1" style="display: none;">
                    <thead style="display: table-header-group;">
                    <tr>
                        <th id="toggA" onclick="toggle(this);" style="display: none;"><b>Aufklappen</b></th>
                        <th id="toggT">Rechnungs Nr.</th>
                        <th id="toggN">Name</th>
                        <th id="toggN">Telefon</th>
                        <th id="toggS">Datum</th>
                    </tr>
                    </thead>
                    <tbody id="table1body" style="overflow-y: auto; height: 200px; width: 100%;">
                    @foreach($lastBills as $lB)
                        <tr>
                            <td>{{$lB->RNR}}</td>
                            <td>{{$lB->Name}}</td>
                            <td>{{$lB->TEL}}</td>
                            <td>{{date('d.m.Y',strtotime($lB->RDT))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
<div style="width:35%; float: left;">
    <ul id="contactform">
        <li>
            <label for="name"> Rechnungs Nr.:</label><br/>
            <span class="fieldbox"><input type="text" name="rnr" id="rnr" disabled/></span>
        </li>
        <li>
            <label for="name"> Rechnungsdatum:</label><br/>
            <span class="fieldbox"><input type="text" name="rdt" id="rdt" disabled/></span>
        </li>
        <li>
            <label for="email"> Telefon</label><br/>
            <span class="fieldbox"><input type="text" name="tel" id="tel" disabled/></span>
        </li>
        <li>
            <label for="email"> Name</label><br/>
            <span class="fieldbox"><input type="text" name="name" id="name" disabled/></span>
        </li>
        <li>
            <label for="email"> Straße</label><br/>
            <span class="fieldbox"><input type="text" name="str" id="str" disabled/></span>
        </li>
        <li>
            <label for="email"> Rechnungszeit</label><br/>
            <span class="fieldbox"><input type="text" name="rzt" id="rzt" disabled/></span>
        </li>
        <li>
            <label for="email"> Summe</label><br/>
            <span class="fieldbox"><input type="text" name="sum" id="sum" disabled/></span>
        </li>
        <input type="hidden" id="storno" />
    </ul>
    <a href="/"><button id="backButton" style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button>
</div>
<script language="javascript">
    $("body").keydown(function(e){
        if (e.which == 27)
            $("#backButton").focus();
    });
    $("#rnr_search").focus();
    $('#rnr_search').keydown(function(e){
        if (e.which == 13)
        {
            if ($("#table1body").children().length == 1)
            {
                $("#cb_storno").focus();
            }
            else if ($("#table1body").children().length == 0)
            {
                alert("Für diese Rechnungsnummer wurde keine Rechnung gefunden!")
            }
            else
            {
                alert("Bitte geben Sie eine eindeutige Rechnungsnummer ein!")
            }
        }
    });

    $("#cb_storno").change(function (e) {
            var retVal = confirm("Sind Sie sicher, dass Sie die Stornierung ändern wollen?");
            if (retVal)
            {
                var xhr = new XMLHttpRequest();
            }
    });

    var tableVisible = false;
    function rnrSearchKeyPress()
    {

        if (tableVisible)
        {
            if (event.keyCode == 40)
            {
                if(check == 0) {
                    changeSelectedTel(selectedRnr);
                    check = 1;
                }
                else
                    changeSelectedTel(selectedRnr+1);
            }
            else if (event.keyCode == 38)
            {
                changeSelectedTel(selectedRnr-1);
            }
            else if (event.keyCode == 13)
            {
                document.getElementById('rnr').focus();
            }
        }
        else
        {
            toggle(document.getElementById('table1'));
        }
    }
    var selectedRnr = 1;
    var check = 0;
    function changeSelectedTel(cselectedRnr)
    {
        var oldSelectedRnr = selectedRnr;
        selectedRnr = cselectedRnr;
        var table = document.getElementById('table1');
        var rows = table.rows;
        if (selectedRnr > rows.length-1)
            selectedRnr--;
        if (selectedRnr < 1)
            selectedRnr++;
        rows[oldSelectedRnr].style.backgroundColor = "";
        rows[selectedRnr].style.backgroundColor = "#D8D8D8";
        rows[selectedRnr].style.color = "#333332";
        var rnr = rows[selectedRnr].cells[0].innerText;
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function(){
            if (xhr.readyState == 4) {
                var bill = JSON.parse(xhr.responseText);
                $("#rnr").val(bill['RNR']);
                $("#rdt").val(bill['RDT']);
                $("#tel").val(bill['TEL']);
                $("#name").val(bill['Name']);
                $("#str").val(bill['Str']);
                $("#rzt").val(bill['RZT']);
                $("#sum").val(bill['RSU']);
                $("#storno").val(bill['INT']);
                if (bill['INT']=="1")
                    $("#cb_storno").prop('checked', false);

                else
                    $("#cb_storno").prop('checked', true);
            }
        });
        xhr.open('GET', '/api/getBill?rnr=' + rnr, true);
        xhr.send(null);
    }

    function rnr_SearchInput()
    {
        var searchString = document.getElementById('rnr_search').value;
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function(){
            if (xhr.readyState == 4) {
                var bills = JSON.parse(xhr.responseText);
                document.getElementById('table1body').innerHTML = "";
                for (var i = 0;i<bills.length;i++)
                {
                    var row = document.getElementById('table1body').insertRow(0);
                    var rnr = row.insertCell(-1);
                    rnr.innerText = bills[i]['RNR'];
                    var name = row.insertCell(-1);
                    name.innerText = bills[i]['Name'];
                    var tel = row.insertCell(-1);
                    tel.innerText = bills[i]['TEL'];
                    var rdt = row.insertCell(-1);
                    rdt.innerText = bills[i]['RDT'];
                }
                if (bills.length == 1)
                {
                    $("#storno").val(bills[0]['INT']);
                    if ($("#storno").val()=="1")
                        $("#cb_storno").prop('checked', true);

                    else
                        $("#cb_storno").prop('checked', false);
                }
            }
        });
        xhr.open('GET','/api/searchBills?rnr=' + searchString);
        xhr.send(null);
    }

    function toggle(cell) {
        tableVisible = !tableVisible;
        document.getElementById("toggA").style.display= "none";
        document.getElementById("toggT").style.display="table-cell";
        document.getElementById("toggN").style.display="table-cell";
        document.getElementById("toggS").style.display= "table-cell";

        if(document.getElementById('table1').style.display == "none") {
            document.getElementById('table1').style.display="table";
            document.getElementById('aufks').className = "glyphicon glyphicon-chevron-up";
        }
        else {
            document.getElementById('table1').style.display="none";
            document.getElementById('aufks').className = "glyphicon glyphicon-chevron-down";
        }

        var table = cell.parentNode;
        while (table && (table.nodeName != 'TABLE')) {
            table = table.parentNode;
        }

        if (table) {
            var tbody = table.getElementsByTagName('tbody')[0];

            if (tbody) {
                tbody.style.display = (tbody.style.display == 'none') ? 'table-row-group' : 'none'
            }
        }
    }

</script>
@stop