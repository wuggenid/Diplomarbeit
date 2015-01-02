@extends('layout')

@section('content')

<h2>Bestellungen</h2>
<div style="padding: 0 30px;">

    <div style="padding: 5px;">
    <h3>Kunde</h3>
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
                  <table width="100%" class="table1" class="div-table-content">
                    <thead>
                      <tr>
                        <th onclick="toggle(this);"><div style="border: 3px solid black"><b>aufklappen</b></div></th>
                        <th onclick="toggle(this);">Telefon</th>
                        <th onclick="toggle(this);">Name</th>
                        <th onclick="toggle(this);">Straße</th>
                      </tr>
                    </thead>
                    <?php $bestellungen = Bestellung::take(10)->orderBy('id','desc')->get(); ?>
                    @for ($i = 0;$i<10;$i++)
                        <tr>
                            <td class="filterable-cell">{{$bestellungen[$i]['ID']}}</td>
                            <td class="filterable-cell">{{$bestellungen[$i]['NA1']." ".$bestellungen[$i]['NA2']}}</td>
                            <td class="filterable-cell">{{$bestellungen[$i]['TEL']}}</td>
                            <td class="filterable-cell">{{$bestellungen[$i]['STR']}}</td>
                        </tr>
                    @endfor
                  </table>

                  <div>
                  <table class="table table-condensed">
                    <tbody style="display: none;">
                    <!--<tr><td colspan="3">76,952 Datensätze, die VIEL zu lange zu laden bräuchten :D</td></tr></b>-->
                    {{--
                    @foreach($addresses as $key => $address)
                        <tr>
                            <td>{{$address->TEL}}</td>
                            <td>{{$address->NA1}}</td>
                            <td>{{$address->STR}}</td>
                        </tr>
                    @endforeach
                    --}}
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
                <table class="table table-condensed">
                    <tbody>
                    @foreach($articles as $key => $article)
                         <tr>
                             <td>{{$article->ANR}}</td>
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


    <a href="/"> <button class="bbutton"> Zurück </button></a>
    <button class="bbutton"> Rückgängig </button>
    <button class="bbutton"> Drucken </button>
    <button class="bbutton"> Bestellung ändern... </button>
    <button class="bbutton"> Speichern </button>


    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>


 </div>

@stop
