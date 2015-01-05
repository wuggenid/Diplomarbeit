@extends('layout')

@section('content')

<h2>Bestellungen</h2>

<div style="padding: 5px 30px;">

    <h3>Kunde</h3>
    <label style="float: right;" >Telefon/Name: <input type="text" id="tel" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /></label>

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
        <div class="contacts" style="float:right; height: 200px; width: 100%;">
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
                            <?php $bestellungen = xadress::take(10)->orderBy('id','desc')->get(); ?>
                            @for ($i = 0;$i<10;$i++)
                                <tr>
                                    <td class="filterable-cell">{{$bestellungen[$i]['ID']}}</td>
                                    <td class="filterable-cell">{{$bestellungen[$i]['NA1']." ".$bestellungen[$i]['NA2']}}</td>
                                    <td class="filterable-cell">{{$bestellungen[$i]['TEL']}}</td>
                                    <td class="filterable-cell">{{$bestellungen[$i]['STR']}}</td>
                                </tr>
                            @endfor
                        </tbody>
                     </table>
                </div>
            </div>

                <div style="clear: both;">
                    <br/><br/><br/>
                    <p><h4>Gesamtpreis Bestellung</h4> <input type="text" style="padding: 10px"/></p><br/>
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

                <?php $articles = xartikel::take(10)->get();?>
                <div class="div-table-content">

                    <table class="table table-condensed">
                        <tbody>
                            @foreach($articles as $key => $article)
                             <tr>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td>{{$article->A0}}</td>
                                <td>{{$article->CB}} €</td>
                                <td> 0 </td>
                                <td> 0 % </td>
                                <td> 0 € </td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <a href="/Bestellungen"> <button class="bbutton"> Zurück </button></a>
    <button class="bbutton"> Rückgängig </button>
    <button class="bbutton"> Drucken </button>
    <button class="bbutton"> Bestellung ändern... </button>
    <button class="bbutton"> Speichern </button>


    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

</div>






    <script language="javascript">
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
                        }
                    })
                    xhr.open('GET', '/api/searchNumber?number=' + number, true);
                    xhr.send(null);
            }
        }
    </script>
@stop
