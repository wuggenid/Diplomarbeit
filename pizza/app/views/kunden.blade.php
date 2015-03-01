@extends('layout')

@section('head')

{{ HTML::style('css/chosen.css') }}

@section('content')

<h2>Kundenstammverwaltung</h2>
<div style="padding: 0 30px;">

    <div style="padding: 5px;">
        <h3>Kunde</h3>
        <div style="width:58%; float: right; padding-top: 20px; ">
            <div class="chosen-container chosen-container-multi">
                <label>Telefon/Name:</label>
                <ul class="chosen-choices">
                    <li class="search-field">
                      <input type="text" id="tel" class="default" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /><input type="button" id="aufk" onclick="toggle(this);" value="Aufklappen"/>
                    </li>
                </ul>
            </div>
        </div>
        <div id="right" style="float: right; width: 50%;">
            <div class="contacts" style="float:right; height: 200px; width: 100%;">
                <div style="height: 200px;">
                    <div>
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

            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <label style="float: left;" id="bestjahr" >Bestellungen/Jahr: </label><br /><br />
            <label style="float: left;" id="letztebest" >Letzte Bestellung: </label><br /><br />
            <label style="float: left;" id="umsatzjahr">Umsatz/Jahr: </label>
        </div>

        <div style="width:40%; float: left;">
            <ul id="contactform">
                <li>
                    <label for="name"> Vorname</label><br/>
                    <span class="fieldbox"><input onkeypress="javascript:vornameKeyPress()" type="text" name="vname" id="vname" /></span>
                </li>
                <li>
                    <label for="name"> Nachname</label><br/>
                    <span class="fieldbox"><input onkeypress="javascript:nachnameKeyPress()" type="text" name="nname" id="nname" /></span>
                </li>
                <li>
                    <label for="email"> Telefon</label><br/>
                    <span class="fieldbox"><input type="text" oninput="javascript:tel2Change()" name="tel" id="tel2" value="{{$tel}}"/></span>
                </li>
                <li>
                    <label for="contact"> Adresse</label><br/>
                    <span class="fieldbox"><input onkeypress="javascript:addKeyPress()" type="text" name="add" id="add" /></span>
                </li>
                <li>
                    <label for="contact"> Ort</label><br/>
                    <span class="fieldbox"><input onkeypress="javscript:ortKeyPress()" type="text" name="ort" id="ort" /></span>
                </li>
                <li>
                    <label for="contact"> Information 1:</label><br/>
                    <span class="fieldbox"><input onkeypress="javascript:if1KeyPress()" type="text" name="if1" id="if1" /></span>
                </li>
                <li>
                    <label for="contact"> Information 2:</label><br/>
                    <span class="fieldbox"><input onkeypress="javscript:if2KeyPress()" type="text" name="if2" id="if2" /></span>
                </li>
                <li>
                    <label for="contact"> Kundenrabbat(10% = 0,1):</label><br/>
                    <span class="fieldbox"><input type="text" name="rabbat" id="rabbat" /></span>
                </li>
            </ul>
        </div>

        <div style="width: 50%">
            <table border="1" style="float: left;">
                <tbody style="background-color: #ffffff;">
                    <tr style="background-color: #ffffff;">
                        <td><a href="/Kunden/delete"><button style="width: 12em;" class="btn btn-lg btn-danger" /><span class="glyphicon glyphicon-trash"></span> Kunden löschen</button></a></td>
                        <td><button style="width: 12em;" onclick="javascript:newClick()" class="btn btn-lg btn-success" ><span class="glyphicon glyphicon-plus"></span> Neuer Kunde</button></td>
                        <td><button style="width: 12em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Etikettendruck</button></td>
                    </tr>
                    <tr style="background-color: #ffffff;">
                        <td><a href=""><a href="/"><button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a></td>
                        <td><button style="width: 12em;" onclick="javascript:updateClick()" class="btn btn-lg btn-success" /><span class="glyphicon glyphicon-floppy-save"></span> Kunden speichern</td>
                        <td><a href=""><button class="btn btn-lg btn-warning" ><span class="glyphicon glyphicon-print"></span> Kundenliste drucken</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script language="javascript">
            document.getElementById('tel').focus(); //am beginn wird die telefonnummer fokusiert

            var selectedTel = 1;
            var check = 0;
            function telInput()
            {
                check = 0;
                selectedTel = 1;
                document.getElementById('tel').style.backgroundColor = "white";
                var number = document.getElementById('tel').value;
                if (number > 99999)
                {
                    var xhr = new XMLHttpRequest();
                    (xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            var numbers = JSON.parse(xhr.responseText);
                            if (numbers.length <= 1)
                            {
                                document.getElementById('tel2').value = numbers[0]['TEL'];
                                document.getElementById('tel2').style.backgroundColor = "#3F3";
                                document.getElementById('vname').value = numbers[0]['NA1'];
                                document.getElementById('nname').value = numbers[0]['NA2'];
                                document.getElementById('tel2').value = numbers[0]['TEL'];
                                document.getElementById('add').value = numbers[0]['STR'];
                                document.getElementById('ort').value = numbers[0]['ORT'];
                                document.getElementById('if1').value = numbers[0]['if1'];
                                document.getElementById('if2').value = numbers[0]['if2'];
                            }
                            if (numbers.length<10)
                            {
                                var table = document.getElementById('table1');
                                while(table.hasChildNodes())
                                {
                                   table.removeChild(table.firstChild);
                                }
                                var header = table.createTHead();

                                for (var i = 0;i<numbers.length;i++)
                                {
                                    var row = table.insertRow(0);
                                    var telCell = row.insertCell(0);
                                    telCell.innerText = numbers[i]['TEL'];
                                    var nameCell = row.insertCell(-1);
                                    var name = "";
                                    if (numbers[i]['NA1'] != null && numbers[i]['NA1'] != "")
                                        name += numbers[i]['NA1'];
                                    if (numbers[i]['NA2'] != null && numbers[i]['NA2'] != "")
                                        name += " " + numbers[i]['NA2'];
                                    nameCell.innerText = name;
                                    var streetCell = row.insertCell(-1);
                                    streetCell.innerText = numbers[i]['STR'];
                                }
                                header.innerHTML = "<tr><th id=\"toggA\" onclick=\"toggle(this);\" style=\" display: none;\"><b>Aufklappen</b></th><th id=\"toggT\" >Telefon</th><th id=\"toggN\" >Name</th><th id=\"toggS\">Straße</th></tr>";
                                if(document.getElementById('table1').style.display == "none") {
                                    document.getElementById('table1').style.display="table";
                                    document.getElementById('aufk').value = "Zuklappen";
                                }
                            }
                        }
                    })
                    xhr.open('GET', '/api/searchNumber?number=' + number, true);
                    xhr.send(null);
                }
            }

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
                var number = rows[selectedTel].cells[0].innerText;
                document.getElementById('tel').value = number;
                var xhr = new XMLHttpRequest();
                (xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        var numbers = JSON.parse(xhr.responseText);
                        if (numbers.length == 1)
                        {
                            document.getElementById('tel2').value = numbers[0]['TEL'];
                            document.getElementById('vname').value = numbers[0]['NA1'];
                            document.getElementById('nname').value = numbers[0]['NA2'];
                            document.getElementById('tel').value = numbers[0]['TEL'];
                            document.getElementById('add').value = numbers[0]['STR'];
                            document.getElementById('ort').value = numbers[0]['ORT'];
                            document.getElementById('if1').value = numbers[0]['IF1'];
                            document.getElementById('if2').value = numbers[0]['IF2'];

                            //Get Orders Per Year
                            var bestxhr = new XMLHttpRequest();
                            (bestxhr.onreadystatechange = function() {
                                if (bestxhr.readyState == 4) {
                                    document.getElementById('bestjahr').innerText = "Bestellungen/Jahr: " + bestxhr.responseText;
                                }
                            })
                            bestxhr.open('GET','/api/getOrdersPerYear?tel='+ number,true);
                            bestxhr.send();

                            var letztexhr = new XMLHttpRequest();
                            (letztexhr.onreadystatechange = function() {
                                if (letztexhr.readyState == 4) {
                                    document.getElementById('letztebest').innerText = "Letzte Bestellung: " + letztexhr.responseText;
                                }
                            })
                            letztexhr.open('GET','/api/getLastOrder?tel=' + number, true);
                            letztexhr.send();
                        }
                    }
                })
                xhr.open('GET', '/api/searchNumber?number=' + number, true);
                xhr.send();
            }
            function telKeyPress()
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
                var number = document.getElementById('tel').value;

                if (event.keyCode == 13)
                {
                    var xhr = new XMLHttpRequest();
                    (xhr.onreadystatechange = function() {
                       if (xhr.readyState == 4) {
                            var numbers = JSON.parse(xhr.responseText);
                            if (numbers.length == 0)
                            {
                                document.getElementById('vname').focus();
                            }
                            else if (numbers.length == 1)
                            {
                                $oldTel = numbers[0]['TEL'];
                                document.getElementById('vname').value = numbers[0]['NA1'];
                                document.getElementById('nname').value = numbers[0]['NA2'];
                                document.getElementById('tel').value = numbers[0]['TEL'];
                                document.getElementById('add').value = numbers[0]['STR'];
                                document.getElementById('ort').value = numbers[0]['ORT'];
                                document.getElementById('if1').value = numbers[0]['IF1'];
                                document.getElementById('if2').value = numbers[0]['IF2'];
                                document.getElementById('rabbat').value = numbers[0]['KRAB'];
                                document.getElementById("tel2").value = document.getElementById("tel").value;
                            }
                        }
                   })
                       xhr.open('GET', '/api/searchNumber?number=' + number, true);
                       xhr.send(null);
                }
            }


            function if2KeyPress()
            {
                if (event.keyCode == 13)
                    document.getElementById('rabbat').focus();
            }
            function if1KeyPress()
            {
                if (event.keyCode == 13)
                    document.getElementById("if2").focus();
            }
            function ortKeyPress()
            {
                if (event.keyCode == 13)
                    document.getElementById('if1').focus();
            }
            function addKeyPress()
            {
                if (event.keyCode == 13)
                    document.getElementById('ort').focus();
            }
            function nachnameKeyPress()
            {
                if (event.keyCode == 13)
                    document.getElementById('add').focus();
            }
            function vornameKeyPress()
            {
                if (event.keyCode == 13)
                    document.getElementById("nname").focus();
            }

            function tel2Change()
            {
                document.getElementById("tel").value = document.getElementById("tel2").value;
            }
            function telChange()
            {
                document.getElementById("tel2").value = document.getElementById("tel").value;
            }
            function newClick()
            {
                if (document.getElementById('tel').value != "")
                {
                    var number = document.getElementById('tel').value;
                    var xhr = new XMLHttpRequest();
                    (xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            var numbers = JSON.parse(xhr.responseText);
                            if (numbers.length>0)
                                alert("Kunde bereits vorhanden!\nZum bearbeiten eines Kunden benutzen Sie bitte die \"Kunde speichern\" Funktion!");
                            else
                            {
                                $vname = document.getElementById('vname').value;
                                $nname = document.getElementById('nname').value;
                                $tel = document.getElementById('tel').value;
                                $str = document.getElementById('add').value;
                                $ort = document.getElementById('ort').value;
                                $if1 = document.getElementById('if1').value;
                                $if2 = document.getElementById('if2').value;
                                $rab = document.getElementById('rabbat').value;

                                window.location.href = "/Kunden/store"
                                        + "?tel=" + $tel
                                        + "&vname=" + $vname
                                        + "&nname=" + $nname
                                        + "&add=" + $str
                                        + "&ort=" + $ort
                                        + "&if1=" + $if1
                                        + "&if2=" + $if2
                                        + "&rab=" + $rab;
                            }
                        }
                    })
                    xhr.open('GET', '/api/searchNumber?number=' + number, true);
                    xhr.send(null);
                }
            }

            $oldTel = "";
            function updateClick()
            {
                if ($oldTel == "")
                {
                    alert("Es wurde kein Kunde ausgewählt!");
                }
                else
                {
                    $vname = document.getElementById('vname').value;
                    $nname = document.getElementById('nname').value;
                    $tel = document.getElementById('tel').value;
                    $str = document.getElementById('add').value;
                    $ort = document.getElementById('ort').value;
                    $if1 = document.getElementById('if1').value;
                    $if2 = document.getElementById('if2').value;
                    $rab = document.getElementById('rabbat').value;
                    window.location.href = "/Kunden/update?oldTel=" + $oldTel
                            + "&tel=" + $tel
                            + "&vname=" + $vname
                            + "&nname=" + $nname
                            + "&add=" + $str
                            + "&ort=" + $ort
                            + "&if1=" + $if1
                            + "&if2=" + $if2
                            + "&rab=" + $rab;
                }
            }






            function toggle(cell) {
              document.getElementById("toggA").style.display= "none";
              document.getElementById("toggT").style.display="table-cell";
              document.getElementById("toggN").style.display="table-cell";
              document.getElementById("toggS").style.display= "table-cell";

              if(document.getElementById('table1').style.display == "none") {
                document.getElementById('table1').style.display="table";
                document.getElementById('aufk').value = "Zuklappen";
                }
              else {
                document.getElementById('table1').style.display="none";
                document.getElementById('aufk').value = "Aufklappen";
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