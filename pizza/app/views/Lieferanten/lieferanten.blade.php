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
            <tbody id="table1body" style="overflow-y: auto; height: 200px; width: 100%;">
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
                    <label for="contact"> Faxnummer</label><br/>
                    <span class="fieldbox"><input type="text" name="faxnr" id="faxnr" /></span>
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
                    <span class="fieldbox"><textarea name="memo" id="memo" cols="40" rows="10"></textarea></span>
                    <br /><br />
                </li>
            </ul>
        </div>
        <div style="width: 50%">
            <table border="1" style="float: left;">
                <tbody style="background-color: #ffffff;">
                    <tr style="background-color: #ffffff;">
                        <td><a href="/Lieferanten/delete"><button class="btn btn-lg btn-danger" /><span class="glyphicon glyphicon-trash"></span> Lieferant löschen</button></a></td>
                        <td><button id="btn_new" onclick="javascript:newClick()" class="btn btn-lg btn-success" ><span class="glyphicon glyphicon-plus"></span> Neuer Lieferant</button></td>
                        <td><button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Etikettendruck</button></td>
                    </tr>
                    <tr style="background-color: #ffffff;">
                        <td><a href=""><a href="/"><button class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a></td>
                        <td><button id="btn_save" onclick="javascript:updateClick()" class="btn btn-lg btn-success" /><span class="glyphicon glyphicon-floppy-save"></span> Lieferant speichern</td>
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

    $('#number').keydown(function(e){
        if (e.which == 13)
            $('#name').focus();
    });
    $('#name').keydown(function(e){
        if (e.which == 13)
            $('#str').focus();
    });
    $('#str').keydown(function(e){
        if (e.which == 13)
            $('#ort').focus();
    });
    $('#ort').keydown(function(e){
        if (e.which == 13)
            $('#ap1').focus();
    });
    $('#ap1').keydown(function(e){
        if (e.which == 13)
            $('#tel1').focus();
    });
    $('#tel1').keydown(function(e){
        if (e.which == 13)
            $('#faxnr').focus();
    });
    $('#faxnr').keydown(function(e){
        if (e.which == 13)
            $('#ap2').focus();
    });
    $('#ap2').keydown(function(e){
        if (e.which == 13)
            $('#tel2').focus();
    });
    $('#tel2').keydown(function(e){
        if (e.which == 13)
            $('#lk').focus();
    });
    $('#lk').keydown(function(e){
        if (e.which == 13)
            $('#memo').focus();
    });
    var tableVisible = false;
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
      document.getElementById('search').focus();
    }
    function searchKeyPress()
    {
        if (tableVisible)
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
            else if (event.keyCode == 13)
            {
                document.getElementById('number').focus();
            }
        }
        else
        {
            toggle(document.getElementById('table1'));
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
        (xhr.onreadystatechange = function(){
            if (xhr.readyState == 4) {
                var lieferant = JSON.parse(xhr.responseText);
                document.getElementById('number').value = lieferant['LNR'];
                document.getElementById('name').value = lieferant['LNAME'];
                document.getElementById('str').value = lieferant['LSTR'];
                document.getElementById('ort').value = lieferant['LORT'];
                document.getElementById('ap1').value = lieferant['LANSPR1'];
                document.getElementById('tel1').value = lieferant['LTEL1'];
                document.getElementById('faxnr').value = lieferant['LFAX'];
                document.getElementById('ap2').value = lieferant['LANSPR2'];
                document.getElementById('tel2').value = lieferant['LTEL2'];
                document.getElementById('lk').value = lieferant['LLKON'];
                document.getElementById('memo').value = lieferant['LMEMO'];
            }
        });
        xhr.open('GET', '/api/getSupplier?lnr=' + lnr, true);
        xhr.send(null);
    }
    function searchInput()
    {
        var searchString = document.getElementById('search').value;
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function(){
            if (xhr.readyState == 4) {
                var lieferanten = JSON.parse(xhr.responseText);
                document.getElementById('table1body').innerHTML = "";
                for (var i = 0;i<lieferanten.length;i++)
                {
                    var row = document.getElementById('table1body').insertRow(0);
                    var name = row.insertCell(-1);
                    name.innerText = lieferanten[i]['LNAME'];
                    var number = row.insertCell(-1);
                    number.innerText = lieferanten[i]['LNR'];
                    var str = row.insertCell(-1);
                    str.innerText = lieferanten[i]['LSTR'];
                }
            }
        });
        xhr.open('GET','/api/searchSupplier?name=' + searchString);
        xhr.send(null);
    }
    function newClick()
    {
        var number = document.getElementById('number').value;
        var name = document.getElementById('name').value;
        var str = document.getElementById('str').value;
        var ort = document.getElementById('ort').value;
        var ap1 = document.getElementById('ap1').value;
        var tel1 = document.getElementById('tel1').value;
        var faxnr = document.getElementById('faxnr').value;
        var ap2 = document.getElementById('ap2').value;
        var tel2 = document.getElementById('tel2').value;
        var lk = document.getElementById('lk').value;
        var memo = document.getElementById('memo').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','/Lieferanten/store?number='+number
                                                   +'&name='+name
                                                   +'&str='+str
                                                   +'&ort='+ort
                                                   +'&ap1='+ap1
                                                   +'&tel1='+tel1
                                                   +'&faxnr='+faxnr
                                                   +'&ap2='+ap2
                                                   +'&tel2='+tel2
                                                   +'&lk='+lk
                                                   +'&memo'+memo
                                                   );
        xhr.send(null);

    }
</script>

@stop