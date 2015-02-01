@extends('layout')

@section('head')

{{ HTML::style('css/chosen.css') }}

@section('content')

<h2>Bestellungen</h2>
<div style="padding: 5px 30px;">

    <h3>Kunde</h3>
    <div class="chosen-container chosen-container-multi">
        <label>Telefon/Name:</label>
        <ul class="chosen-choices">
            <li class="search-field">
                <input type="text" id="tel" class="default" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" />
            </li>
        </ul>
    </div>

    <div style="width:40%; float: left;">
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

            <br/><br/>
        <div class="contacts" style="float:right; height: 200px; width: 100%; overflow: auto;">
            <div style="height: 200px;">

                <script type="text/javascript">
                    function toggle(cell) {
                      var table = cell.parentNode;

                      while (table && (table.nodeName != 'TABLE')) {
                        table = table.parentNode;
                      }

                      if (table) {
                        var tbody = table.getElementsByTagName('tbody')[0];

                        if (tbody) {
                          tbody.style.display = (tbody.style.display == 'none') ? 'table-row-group' : 'none';
                        }
                      }
                    }
                </script>

                <div class="panel panel-default">
                    <table width="100%" class="table1">
                        <thead>
                            <tr>
                                <th onclick="toggle(this);"><div style="border: 3px solid black"><b>aufklappen</b></div></th>
                                <th onclick="toggle(this);">Telefon</th>
                                <th onclick="toggle(this);">Name</th>
                                <th onclick="toggle(this);">Straße</th>
                            </tr>
                        </thead>
                        <tbody style="display: none;">
                            <?php $bestellungen = xadress::take(10)->get(); ?>
                            @for ($i = 0;$i<10;$i++)
                                <tr>
                                    <td class="filterable-cell">Useless column</td>
                                    <td class="filterable-cell">{{$bestellungen[$i]['TEL']}}</td>
                                    <td class="filterable-cell">{{$bestellungen[$i]['NA1']." ".$bestellungen[$i]['NA2']}}</td>
                                    <td class="filterable-cell">{{$bestellungen[$i]['STR']}}</td>
                                </tr>
                            @endfor
                        </tbody>
                     </table>
                </div>
            </div>


        </div>
        <div id="gesamtpreis" style="clear: both;">
              <br/><br/><br/>
              <p><h4>Gesamtpreis Bestellung</h4> <input id="gesamtpreisBox" type="text" style="padding: 10px"/></p><br/>
          </div>
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
                                <td><input onkeydown="javascript:artikelnummerKeyPress()" class="artikelnummerTbx" id="textbox" style="text-align: center;" size="5" type="text"/></td>
                                <td class="artikelbezeichnung" id="artikelbezeichnung"></td>
                                <td class="einzelpreis" id="einzelpreis"></td>
                                <td class="menge" id="menge"><input class="mengeBox" id="mengeBox" onkeypress="javascript:mengeBoxKeyPress()" style="text-align: center;" size="5" type="text"/></td>
                                <td class="rabbat" id="rabbat"></td>
                                <td class="summe" id="summe"></td>
                             </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <a href="/Bestellungen"> <button class="bbutton"> Zurück </button></a>
    <button class="bbutton"> Rückgängig </button>
    <button onclick="javascript:saveOrder()" class="bbutton"> Drucken </button>
    <button class="bbutton"> Bestellung ändern... </button>
    <!--<button class="bbutton"> Speichern </button>-->


    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>





    <script language="javascript">
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
                (xhr.onreadystatechange = function()
                {
                   if (xhr.readyState == 4)
                   {
                        alert('Sent!');
                   }
                })
                var GM = mengeBoxes[i].value;
                var ANR = artikelnummerBoxes[i].value;
                var A0 =  artikelbezeichnungen[i].innerText;
                var CB = einzelpreisBoxes[i].innerText.split('€')[0];
                var SU = summeBoxes[i].innerText.split('€')[0];
                console.log("sending store request");
                xhr.open('GET', 'storeSingleValue?GM='+GM+'&ANR='+ANR+'&A0='+A0+'&CB='+CB+'&SU='+SU+'&RNR='+rechnungsnummer, true);
                xhr.send();
            }
        }
        function mengeBoxKeyPress()
        {
            var keycode = event.keyCode;
            if(keycode == '13')
            {
                //var einzelpreis = document.getElementById('einzelpreis').innerText.split('€')[0];
                //document.getElementById('summe').innerText = (einzelpreis * $(".mengeBox").val()) + "€";
                var summeBoxes = document.getElementsByClassName('summe');
                var einzelpreisBoxes = document.getElementsByClassName('einzelpreis');
                var mengeBoxes = document.getElementsByClassName('mengeBox');
                var gesamtsumme = 0;
                for (i = 0;i<summeBoxes.length;i++)
                {
                    var summe = einzelpreisBoxes[i].innerText.split('€')[0] * mengeBoxes[i].value;
                    summeBoxes[i].innerText = summe + '€';
                    gesamtsumme += summe;
                }
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
                artikelnummer.innerHTML = '<input class="artikelnummerTbx" onkeydown="javascript:artikelnummerKeyPress()" id="textbox" style="text-align: center;" size="5" type="text"/>';
                menge.innerHTML = '<input class="mengeBox" id="mengeBox" onkeypress="javascript:mengeBoxKeyPress()" style="text-align: center;" size="5" type="text"/>';
                var tbxs = document.getElementsByClassName('artikelnummerTbx');
                tbxs[tbxs.length-1].focus();
            }
        }

        function artikelnummerKeyPress(e)
        {
            if (event.keyCode == 13)
            {
                var ANR = document.activeElement.value;
                var xhr = new XMLHttpRequest();
                (xhr.onreadystatechange = function()
                {
                   if (xhr.readyState == 4)
                   {
                        var artikel = JSON.parse(xhr.responseText);
                        document.getElementsByClassName('artikelbezeichnung')[document.getElementsByClassName('artikelbezeichnung').length-1].innerText = artikel[0]['A0'];
                        document.getElementsByClassName('einzelpreis')[document.getElementsByClassName('einzelpreis').length-1].innerText = artikel[0]['CB'] + '€';
                        document.getElementsByClassName('mengeBox')[document.getElementsByClassName('mengeBox').length-1].focus();
                        document.getElementsByClassName('rabbat')[document.getElementsByClassName('rabbat').length-1].innerText = rabbat;
                        /*document.getElementById('artikelbezeichnung').innerText = artikel[0]['A0'];
                        document.getElementById('einzelpreis').innerText = artikel[0]['CB'] + '€';
                        document.getElementById('mengeBox').focus();
                        document.getElementById('rabbat').innerText = rabbat;*/
                   }
                })
                xhr.open('GET', '/api/getArtikel?artikel=' + ANR, true);
                xhr.send(null);
            }
        }

        /*function artikelKeyPress(x,y)
        {
            var table = document.getElementById('artikelTable');
            var cells = table.getElementByTagName('td');
            //var cells = rows[y];
            //console.log(cells);
            alert(cells);
            alert(table);
        }*/

        var rabbat = -1;
        function telInput()
        {
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
                            document.getElementById('tel').value = numbers[0]['TEL'];
                            document.getElementById('tel').style.backgroundColor = "green";
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
                xhr.send(null);
            }

        }
        function telKeyPress(e)
        {
            var number = document.getElementById('tel').value;
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
