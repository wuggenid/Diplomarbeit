@extends('layout')

@section('content')

<h2>Bestellungen</h2>
<div style="padding: 0 30px;">
    <div style="padding: 5px">
    <h3>Kunde</h3>
        <div style="width:40%; float: left;">
            <ul id="contactform">
                <li>
                    <label for="name"> Vorname</label><br/>
                    <span class="fieldbox"><input type="text" name="vname" id="vname" value=""/></span>
                </li>
                <li>
                    <label for="name"> Nachname</label><br/>
                    <span class="fieldbox"><input type="text" name="nname" id="nname" value=""/></span>
                </li>
                <li>
                    <label for="email"> Telefon</label><br/>
                    <span class="fieldbox"><input type="text" name="tel" id="tel" value=""/></span>
                </li>
                <li>
                    <label for="contact"> Adresse</label><br/>
                    <span class="fieldbox"><input type="text" name="add" id="add" value=""/></span>
                </li>
                <li>
                    <label for="contact"> Ort</label><br/>
                    <span class="fieldbox"><input type="text" name="ort" id="ort" value=""/></span>
                </li>
                <li>
                    <label for="msg"> Informationen</label><br/>
                    <span class="msgbox"><textarea class="area" id="msg" name="msg" rows="8" cols="30" style="resize: none;"></textarea></span>
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
                  <table width="100%">
                    <thead>
                      <tr>
                        <th onclick="toggle(this);"><div style="border: 3px solid black"><b>aufklappen</b></div></th>
                        <th onclick="toggle(this);">Name</th>
                        <th onclick="toggle(this);">Telefon</th>
                        <th onclick="toggle(this);">Straße</th>
                      </tr>
                    </thead>
                    <tbody style="display: none;">
                      <tr>
                        <td></td>
                        <td>Pizza Eduardos</td>
                        <td>04242/219199</td>
                        <td>Irgendwos 23</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>Pizza Eduardos</td>
                        <td>04242/219199</td>
                        <td>Irgendwos 23</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>Pizza Eduardos</td>
                        <td>04242/219199</td>
                        <td>Irgendwos 23</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>Pizza Eduardos</td>
                        <td>04242/219199</td>
                        <td>Irgendwos 23</td>
                      </tr>
                    </tbody>
                  </table>

            </div>


            <div style="clear: both;">
                <br/><br/><br/>
                <p><h3>Gesamtpreis Bestellung</h3> <input type="text" style="padding: 10px"/></p><br/>
            </div>

        </div>
        </div>


    </div>

    <div style="padding-top: 10px; clear: both;">
        <h3>Artikel</h3>
        <p>
        <div style="height: 200px; width: 100%;">
            <div style="height: 250px;">
                <table class="table table-striped">
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
                    <tbody>
                        <tr>
                            <td class="filterable-cell">0001</td>
                            <td class="filterable-cell">Pizza</td>
                            <td class="filterable-cell">5</td>
                            <td class="filterable-cell">1</td>
                            <td class="filterable-cell">0</td>
                            <td class="filterable-cell">5</td>
                        </tr>
                        <tr>
                            <td class="filterable-cell">0001</td>
                            <td class="filterable-cell">Pizza</td>
                            <td class="filterable-cell">5</td>
                            <td class="filterable-cell">1</td>
                            <td class="filterable-cell">0</td>
                            <td class="filterable-cell">5</td>
                        </tr>
                        <tr>
                            <td class="filterable-cell">0001</td>
                            <td class="filterable-cell">Pizza</td>
                            <td class="filterable-cell">5</td>
                            <td class="filterable-cell">1</td>
                            <td class="filterable-cell">0</td>
                            <td class="filterable-cell">5</td>
                        </tr>
                        <tr>
                            <td class="filterable-cell">0001</td>
                            <td class="filterable-cell">Pizza</td>
                            <td class="filterable-cell">5</td>
                            <td class="filterable-cell">1</td>
                            <td class="filterable-cell">0</td>
                            <td class="filterable-cell">5</td>
                        </tr>
                        <tr>
                            <td class="filterable-cell">0001</td>
                            <td class="filterable-cell">Pizza</td>
                            <td class="filterable-cell">5</td>
                            <td class="filterable-cell">1</td>
                            <td class="filterable-cell">0</td>
                            <td class="filterable-cell">5</td>
                        </tr>
                        <tr>
                            <td class="filterable-cell">0001</td>
                            <td class="filterable-cell">Pizza</td>
                            <td class="filterable-cell">5</td>
                            <td class="filterable-cell">1</td>
                            <td class="filterable-cell">0</td>
                            <td class="filterable-cell">5</td>
                        </tr>
                        <tr>
                            <td class="filterable-cell">0001</td>
                            <td class="filterable-cell">Pizza</td>
                            <td class="filterable-cell">5</td>
                            <td class="filterable-cell">1</td>
                            <td class="filterable-cell">0</td>
                            <td class="filterable-cell">5</td>
                        </tr>
                        <tr>
                            <td class="filterable-cell">0001</td>
                            <td class="filterable-cell">Pizza</td>
                            <td class="filterable-cell">5</td>
                            <td class="filterable-cell">1</td>
                            <td class="filterable-cell">0</td>
                            <td class="filterable-cell">5</td>
                        </tr>
                    </tbody>

                    </table>
            </div>
        </div>
        </p>
    </div>
    <br/>

    <button class="bbutton"> Zurück </button>
    <button class="bbutton"> Rückgängig </button>
    <button class="bbutton"> Drucken </button>
    <button class="bbutton"> Bestellung ändern... </button>
    <button class="bbutton"> Speichern </button>

    <br/><br/>

    </div>

@stop
