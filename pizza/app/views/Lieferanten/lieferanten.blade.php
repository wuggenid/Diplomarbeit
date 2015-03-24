@extends('...layout')

@section('content')

<h2>Lieferantenstammverwaltung</h2>

<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <h3>Lieferant</h3>
    <div id="right" style="float: right; width: 58%; padding-top: 20px">
        <label>Lieferantenauswahl:</label><br />
        <input autocomplete="off" type="text" id="search" class="default" oninput="javascript:searchInput(this)" onkeydown="javascript:searchKeyPress(this)" /><button type="button" id="aufk" onclick="toggle(this);"/><span id="aufks" class="glyphicon glyphicon-chevron-down"></span>
        <table  width="100%" class="table1" id="table1" style="display: none;">
            <thead style="display: table-header-group;">
                <tr>
                    <th id="toggA" onclick="toggle(this);" style="display: none;"><b>Aufklappen</b></th>
                    <th id="toggT">Name</th>
                    <th id="toggN">Nummer</th>
                    <th id="toggS">Straße</th>
                </tr>
            </thead>
            <tbody style="overflow-y: auto; height: 200px; width: 100%;">
                @foreach($lieferanten as $lieferant)
                    <tr>
                        <td>{{$lieferant->LNAME}}</td>
                        <td>{{$lieferant->LNR}}</td>
                        <td>{{$lieferant->LSTR}}</td>
                    </tr>
                @endforeach
            </tbody>
         </table>
    </div>
        <div style="width:40%; float: left;">
            <ul id="contactform">
                <li>
                    <label for="name"> Nummer</label><br/>
                    <span class="fieldbox"><input type="text" name="nummer" id="number" /></span>
                </li>
                <li>
                    <label for="name"> Name</label><br/>
                    <span class="fieldbox"><input type="text" name="name" id="name" /></span>
                </li>
                <li>
                    <label for="email"> Straße</label><br/>
                    <span class="fieldbox"><input type="text" name="add" id="str" /></span>
                </li>
                <li>
                    <label for="contact"> Ort</label><br/>
                    <span class="fieldbox"><input type="text" name="ort" id="ort" /></span>
                </li>
                <li>
                    <label for="contact"> Ansprechperson 1</label><br/>
                    <span class="fieldbox"><input type="text" name="ap1" id="ap1" /></span>
                </li>
                <li>
                    <label for="contact"> Telefon 1</label><br/>
                    <span class="fieldbox"><input type="text" name="tel1" id="tel1" /></span>
                </li>
                <li>
                    <label for="contact"> Ansprechperson 2</label><br/>
                    <span class="fieldbox"><input type="text" name="ap2" id="ap2" /></span>
                </li>
                <li>
                    <label for="contact"> Telefon 2</label><br/>
                    <span class="fieldbox"><input type="text" name="tel2" id="tel2" /></span>
                </li>
                <li>
                    <label for="contact"> Letzter Kontakt:</label><br/>
                    <span class="fieldbox"><input type="text" name="lk" id="lk" /></span>
                </li>
                <li>
                    <label for="contact"> Memo:</label><br/>
                    <span class="fieldbox"><textarea name="memo" id="memo"></textarea></span>
                    <br /><br />
                </li>
            </ul>
        </div>
        <div style="width: 50%">
            <table border="1" style="float: left;">
                <tbody style="background-color: #ffffff;">
                    <tr style="background-color: #ffffff;">
                        <td><a href="/Lieferanten/delete"><button class="btn btn-lg btn-danger" /><span class="glyphicon glyphicon-trash"></span> Lieferant löschen</button></a></td>
                        <td><button onclick="javascript:newClick()" class="btn btn-lg btn-success" ><span class="glyphicon glyphicon-plus"></span> Neuer Lieferant</button></td>
                        <td><button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Etikettendruck</button></td>
                    </tr>
                    <tr style="background-color: #ffffff;">
                        <td><a href=""><a href="/"><button class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a></td>
                        <td><button onclick="javascript:updateClick()" class="btn btn-lg btn-success" /><span class="glyphicon glyphicon-floppy-save"></span> Lieferant speichern</td>
                        <td><a href=""><button class="btn btn-lg btn-warning" ><span class="glyphicon glyphicon-print"></span> Lieferantenliste drucken</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<style type="text/css">
    .btn
    {
        width: 14em;
    }
</style>
<script language="javascript">
    document.getElementById('search').focus();
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
      document.getElementById('search').focus();
    }
    function searchKeyPress()
    {
        if (event.keyCode == 40)
        {
            if(check == 0) {
                changeSelectedTel(selectedTel);
                check = 1;
        }
        else
            changeSelectedTel(selectedTel+1);
        }
        else if (event.keyCode == 38)
        {
            changeSelectedTel(selectedTel-1);
        }
    }
    var selectedTel = 1;
    var check = 0;
    function changeSelectedTel(cselectedTel)
    {
        var oldSelectedTel = selectedTel;
        selectedTel = cselectedTel;
        var table = document.getElementById('table1');
        var rows = table.rows;
        if (selectedTel > rows.length-1)
            selectedTel--;
        if (selectedTel < 1)
            selectedTel++;
        rows[oldSelectedTel].style.backgroundColor = "";
        rows[selectedTel].style.backgroundColor = "#D8D8D8";
        rows[selectedTel].style.color = "#333332";
        var lnr = rows[selectedTel].cells[1].innerText;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechangefunction = function(){
            if (xhr.readyState == 4) {
                var lieferant = JSON.parse(xhr.responseText);
                document.getElementById('number').value = lieferant['LNR'];
            }
        };
        xhr.open('GET', '/api/getSupplier?lnr=' + lnr, true);
        xhr.send(null);
    }
</script>

@stop