@extends('...layout')

@section('head')

{{ HTML::style('css/chosen.css') }}

@section('content')

<h2>Bestellungen</h2>
<div style="padding: 5px 30px;">

    <h3>Kunde</h3>


    <div style="width:38%; float: left;">
        <ul id="contactform">
            <li>
                <label for="name"> Vorname</label><br/>
                <span class="fieldbox"><input type="text" name="vname" id="vname" value="{{--$bestellung['NA1']--}}" disabled/></span>
            </li>
            <li>
                <label for="name"> Nachname</label><br/>
                <span class="fieldbox"><input type="text" name="nname" id="nname" value="{{--$bestellung['NA2']--}}" disabled/></span>
            </li>
            <li>
                <label for="email"> Telefon</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel" value="{{--$bestellung['TEL']--}}" disabled/></span>
            </li>
            <li>
                <label for="contact"> Adresse</label><br/>
                <span class="fieldbox"><input type="text" name="add" id="add" value="{{--$bestellung['STR']--}}" disabled/></span>
            </li>
            <li>
                <label for="contact"> Ort</label><br/>
                <span class="fieldbox"><input type="text" name="ort" id="ort" value="{{--$bestellung['ORT']--}}" disabled/></span>
            </li>
            <li>
                <label for="msg"> Informationen</label><br/>
                <span class="msgbox"><textarea class="area" id="msg" name="msg" rows="8" cols="30" style="resize: none;" disabled>{{--$bestellung['IF1']."\n\r".$bestellung['IF2']--}}</textarea></span>
            </li>
        </ul>
    </div>


    <div style="width:58%; float: right; padding-top: 20px; ">
        <div class="chosen-container chosen-container-multi">
            <label>Telefon/Name:</label>
            <ul class="chosen-choices">
                <li class="search-field">
                    <input type="text" id="tels" class="default" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /><button type="button" id="aufk" onclick="toggle(this);"/><span id="aufks" class="glyphicon glyphicon-chevron-down"></span>
                </li>
            </ul>
        </div>

        <div class="contacts" style="float:right; height: 200px; width: 100%;">
            <div style="height: 200px;">

                <script type="text/javascript">
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

                <div style="z-index: 99; position: relative;">
                    <table  width="100%" class="table1" id="table1" style="display: none;">
                        <thead style="display: table-header-group;">
                            <tr>
                                <th id="toggA" onclick="toggle(this);" style="display: none;"><b>Aufklappen</b></th>
                                <th id="toggT">Telefon</th>
                                <th id="toggN">Name</th>
                                <th id="toggS">Straße</th>
                            </tr>
                        </thead>
                        <tbody style="overflow-y: auto; max-height: 200px; display: inline-block; width: 300%;">
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
        <div id="gesamtpreis" style="clear: both;">
              <br/><br/><br/>
              <p><h4>Gesamtpreis Bestellung</h4> <input id="gesamtpreisBox" type="text" style="padding: 10px" disabled/></p><br/>
        </div>
    </div>



    <div style="padding-top: 10px; clear: both;">
        <h3>Artikel</h3>

        <div style="height: 450px; width: 100%;">
            <div class="panel panel-default">

                <table class="table table-condensed" >
                    <thead>
                        <tr>
                            <th>Artikel-Nr</th>
                            <th>Artikelbezeichnung</th>
                            <th>Einzelpreis</th>
                            <th>Menge</th>
                            <th>Rabatt</th>
                            <th>Summe</th>
                        </tr>
                    </thead>
                </table>

                <div class="div-table-content">

                    <table id="artikelTable" class="table table-condensed">
                        <tbody>
                             <tr>
                                <td><input onkeyup="javascript:artikelnummerKeyPress(this)" class="artikelnummerTbx" id="textbox" style="text-align: center;" size="5" type="text" disabled/></td>
                                <td class="artikelbezeichnung" id="artikelbezeichnung"></td>
                                <td class="einzelpreis" id="einzelpreis"></td>
                                <td class="menge" id="menge"><input class="mengeBox" id="mengeBox" onkeyup="javascript:mengeBoxKeyPress(this)" style="text-align: center;" size="5" type="text" disabled/></td>
                                <td class="rabbat" id="rabbat"></td>
                                <td class="summe" id="summe"></td>
                             </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    <a href="/Bestellungen"> <button style="width: 7em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <!--<button class="bbutton"> Rückgängig </button>-->
    <!--<button class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-pencil"></span> Bestellung ändern...</button>-->
    <button onclick="javascript:saveOrder()" id="btn_drucken" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-print"></span> Drucken</button>
    <!--<button class="bbutton"> Speichern </button>-->
    <br/><br/>





    <script language="javascript">
        document.getElementById('tels').focus();
        function saveOrder()
        {
            var summeBoxes = document.getElementsByClassName('summe');
            var einzelpreisBoxes = document.getElementsByClassName('einzelpreis');
            var mengeBoxes = document.getElementsByClassName('mengeBox');
            var artikelnummerBoxes = document.getElementsByClassName('artikelnummerTbx');
            var artikelbezeichnungen = document.getElementsByClassName('artikelbezeichnung');

            var rechnungsnummer = 0;
            var xhr = new XMLHttpRequest();
            (xhr.onreadystatechange = function()
            {
                if (xhr.readyState == 4)
                {
                    rechnungsnummer = xhr.responseText;
                }
            })
            xhr.open('GET','/api/getLastBillNumber/', false);
            xhr.send();
            for (i = 0;i<summeBoxes.length;i++)
            {
                var xhr = new XMLHttpRequest();
                var GM = mengeBoxes[i].value;
                var ANR = artikelnummerBoxes[i].value;
                var A0 =  artikelbezeichnungen[i].innerText;
                var CB = einzelpreisBoxes[i].innerText.split('€')[0];
                var SU = summeBoxes[i].innerText.split('€')[0];
                var TEL = document.getElementById('tels').value;
                if (ANR != "" && GM != "")
                {
                    $href = 'storeSingleValue?GM='+GM+'&ANR='+ANR+'&A0='+A0+'&CB='+CB+'&SU='+SU+'&RNR='+rechnungsnummer+'&PNR='+i+'&TEL='+TEL;
                    xhr.open('GET', $href, false);
                    xhr.send();
                }
            }

            window.location.href = "/";
        }

        function mengeBoxKeyPress(e)
        {
            var keycode = event.keyCode;

            if(keycode == '13')
            {
                var summeBoxes = document.getElementsByClassName('summe');
                var einzelpreisBoxes = document.getElementsByClassName('einzelpreis');
                var mengeBoxes = document.getElementsByClassName('mengeBox');
                var gesamtsumme = 0;
                for (i = 0;i<summeBoxes.length;i++)
                {
                    var summe = Math.round((einzelpreisBoxes[i].innerText.split('€')[0] * mengeBoxes[i].value)*100000000)/100000000;
                    summeBoxes[i].innerText = summe + '€';
                    gesamtsumme += summe;
                }
                gesamtsumme = Math.round(gesamtsumme*100000000)/100000000;
                document.getElementById('gesamtpreisBox').value = gesamtsumme + '€';
                var table = document.getElementById('artikelTable');
                var row = table.insertRow(-1);
                var artikelnummer = row.insertCell(-1);
                artikelnummer.className = "artikelnummer";
                var artikelbezeichnung = row.insertCell(-1);
                artikelbezeichnung.className="artikelbezeichnung";
                var einzelpreis = row.insertCell(-1);
                einzelpreis.className = "einzelpreis";
                var menge = row.insertCell(-1);
                menge.className = "menge";
                var rabbat = row.insertCell(-1);
                rabbat.className = "rabbat";
                var summe = row.insertCell(-1);
                summe.className = "summe";
                artikelnummer.innerHTML = '<input class="artikelnummerTbx" onkeyup="javascript:artikelnummerKeyPress(this)" id="textbox" style="text-align: center;" size="5" type="text"/>';
                menge.innerHTML = '<input class="mengeBox" id="mengeBox" onkeyup="javascript:mengeBoxKeyPress(this)" style="text-align: center;" size="5" type="text"/>';
                var tbxs = document.getElementsByClassName('artikelnummerTbx');
                tbxs[tbxs.length-1].focus();
            }
        }

        function artikelnummerKeyPress(e)
        {
            if (event.keyCode == 13)
            {
                var ANR = e.value;
                if (ANR == "")
                    document.getElementById("btn_drucken").focus();
                else
                {
                    var xhr = new XMLHttpRequest();
                    (xhr.onreadystatechange = function()
                    {
                       if (xhr.readyState == 4)
                       {
                            var artikel = JSON.parse(xhr.responseText);
                            document.getElementsByClassName('artikelbezeichnung')[document.getElementsByClassName('artikelbezeichnung').length-1].innerText = artikel[0]['A0'];
                            document.getElementsByClassName('einzelpreis')[document.getElementsByClassName('einzelpreis').length-1].innerText = artikel[0]['CB'] + '€';
                            document.getElementById('mengeBox').removeAttribute("disabled");
                            document.getElementsByClassName('mengeBox')[document.getElementsByClassName('mengeBox').length-1].focus();
                            document.getElementsByClassName('rabbat')[document.getElementsByClassName('rabbat').length-1].innerText = rabbat;
                       }
                    })
                    xhr.open('GET', '/api/getArtikel?artikel=' + ANR, true);
                    xhr.send(null);
                }
            }
        }

        var rabbat = -1;
        function telInput()
        {
            check = 0;
            selectedTel = 1;
            document.getElementById('tels').style.backgroundColor = "white";
            var number = document.getElementById('tels').value;
            if (number > 99999)
            {
                var xhr = new XMLHttpRequest();
                (xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        var numbers = JSON.parse(xhr.responseText);
                        if (numbers.length <= 1)
                        {
                            document.getElementById('tel').value = numbers[0]['TEL'];
                            document.getElementById('tel').style.backgroundColor = "#3F3";
                            document.getElementById('vname').value = numbers[0]['NA1'];
                            document.getElementById('nname').value = numbers[0]['NA2'];
                            document.getElementById('tel').value = numbers[0]['TEL'];
                            document.getElementById('add').value = numbers[0]['STR'];
                            document.getElementById('ort').value = numbers[0]['ORT'];
                            if (numbers[0]['IF1'] == null)
                                numbers[0]['IF1'] = "";
                            if (numbers[0]['IF2'] == null)
                                numbers[0]['IF2'] = "";
                            document.getElementById('msg').value = numbers[0]['IF1'] + "\n" + numbers[0]['IF2'];
                            rabbat = numbers[0]['KRAB'];
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
                                document.getElementById('aufks').className = "glyphicon glyphicon-chevron-up";
                            }
                        }
                    }
                })
                xhr.open('GET', '/api/searchNumber?number=' + number, true);
                xhr.send(null);
            }

        }
        var selectedTel = 1;
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
            document.getElementById('tels').value = number;
            var xhr = new XMLHttpRequest();
            (xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    var numbers = JSON.parse(xhr.responseText);
                    if (numbers.length == 1)
                    {
                        document.getElementById('tel').value = numbers[0]['TEL'];
                        document.getElementById('vname').value = numbers[0]['NA1'];
                        document.getElementById('nname').value = numbers[0]['NA2'];
                        document.getElementById('tel').value = numbers[0]['TEL'];
                        document.getElementById('add').value = numbers[0]['STR'];
                        document.getElementById('ort').value = numbers[0]['ORT'];
                        if (numbers[0]['IF1'] == null)
                            numbers[0]['IF1'] = "";
                        if (numbers[0]['IF2'] == null)
                            numbers[0]['IF2'] = "";
                        document.getElementById('msg').value = numbers[0]['IF1'] + "\n" + numbers[0]['IF2'];
                        rabbat = numbers[0]['KRAB'];
                    }
                }
            })
            xhr.open('GET', '/api/searchNumber?number=' + number, true);
            xhr.send();
        }

        var check = 0;
        function telKeyPress(e)
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
            var number = document.getElementById('tels').value;
            if (event.keyCode == 13)
            {

                var xhr = new XMLHttpRequest();
                    (xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            var numbers = JSON.parse(xhr.responseText);
                            if (numbers.length == 0)
                            {
                                if (confirm('Kunde wurde nicht gefunden! Wollen sie einen neuen Kunden aufnehmen?'))
                                {
                                    window.location.href = "/Kunden/create?tel=" + number;
                                }
                            }
                            else if (numbers.length == 1)
                            {
                                window.location.href = "#gesamtpreis";
                                document.getElementById('textbox').removeAttribute("disabled");
                                document.getElementById('textbox').focus();
                            }
                        }
                    })
                    xhr.open('GET', '/api/searchNumber?number=' + number, true);
                    xhr.send(null);
            }
        }
    </script>
@stop
