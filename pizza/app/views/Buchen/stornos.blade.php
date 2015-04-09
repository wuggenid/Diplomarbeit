@extends('layout')

@section('content')

<h2>Stornos</h2>
<div id="right" style="float: right; width: 58%; padding-top: 20px">

    <div class="chosen-container chosen-container-multi">
        <label>Rechnungsnummer:</label>
        <ul class="chosen-choices">
            <li class="search-field">
                <input type="text" id="tel" class="default" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /><button type="button" id="aufk" onclick="toggle(this);"/><span id="aufks" class="glyphicon glyphicon-chevron-down"></span>
            </li>
        </ul>
    </div>

    <div class="contacts" style="float:right; height: 300px; width: 100%;">
        <div style="height: 200px;">
                <table  width="100%" class="table1" id="table1" style="display: none;">
                    <thead style="display: table-header-group;">
                    <tr>
                        <th id="toggA" onclick="toggle(this);" style="display: none;"><b>Aufklappen</b></th>
                        <th id="toggT">Telefon</th>
                        <th id="toggN">Name</th>
                        <th id="toggS">Straße</th>
                    </tr>
                    </thead>
                    <tbody style="overflow-y: auto; height: 200px; width: 100%;">
                    <tr>
                        <td>xTelefon</td>
                        <td>xName</td>
                        <td>xStraße</td>
                    </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<div style="width:35%; float: left;">
    <ul id="contactform">
        <li>
            <label for="name"> Rechnungs Nr.:</label><br/>
            <span class="fieldbox"><input type="text" name="rnr" id="rnr" /></span>
        </li>
        <li>
            <label for="name"> Rechnungsdatum:</label><br/>
            <span class="fieldbox"><input type="text" name="rdt" id="rdt" /></span>
        </li>
        <li>
            <label for="email"> Telefon</label><br/>
            <span class="fieldbox"><input type="text" name="tel" id="tel" /></span>
        </li>
        <li>
            <label for="email"> Name</label><br/>
            <span class="fieldbox"><input type="text" name="name" id="name" /></span>
        </li>
        <li>
            <label for="email"> Straße</label><br/>
            <span class="fieldbox"><input type="text" name="str" id="str" /></span>
        </li>
        <li>
            <label for="email"> Rechnungszeit</label><br/>
            <span class="fieldbox"><input type="text" name="rzt" id="rzt" /></span>
        </li>
        <li>
            <label for="email"> Summe</label><br/>
            <span class="fieldbox"><input type="text" name="sum" id="sum" /></span>
        </li>
    </ul>
    <a href="/"><button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button>
</div>
<script language="javascript">
    function toggle(cell) {
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