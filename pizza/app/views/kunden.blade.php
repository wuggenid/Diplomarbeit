@extends('layout')

@section('content')

<h2>Kundenstammverwaltung</h2>
<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <h3>Kunde</h3>
    <div id="right" style="float: right;">
        <label style="float: left; background-color: orange;" >Telefon/Name:<input type="text" id="tel" oninput="javascript:telChange()" onkeydown="javascript:telKeyPress(this)" /></label><br /><br />
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
            function telKeyPress()
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
        </script>
@stop