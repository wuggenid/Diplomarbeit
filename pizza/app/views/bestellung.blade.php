@extends('layout')

@section('content')

<h2>Bestellungen</h2>

    <div style="padding-top: 5px">
    <h3>Kunde</h3>
        <div style="width:30%; float: left;">
            <!--
            <p><input type="text" class="tinput" placeholder="Vorname"></p>
            <p><input type="text" class="tinput" placeholder="Zuname"></p>
            <p><input type="text" class="tinput" placeholder="Telefon"></p>
            <p><input type="text" class="tinput" placeholder="Adresse"></p>
            <p><input type="text" class="tinput" placeholder="Ort"></p>
            <p><textarea name="info" class="tinput">Informationen</textarea></p>
            -->

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
                    <span class="msgbox"><textarea class="area" id="msg" name="msg" rows="8" cols="30"></textarea></span>
                </li>
            </ul>
        </div>

        <div style="width:68%; float: right; padding-top: 20px;">
            <div style="position: absolute; height: 200px; overflow: auto; width: 40%;">
                <div style="height: 200px;">
                    <table width="100%">
                      <th>Name</th>
                      <th>Telefon</th>
                      <th>Straße</th>
                      <tb>
                          <tr>
                            <td>Pizza Eduardos</td>
                            <td>04242/219199</td>
                            <td>Irgendwos 23</td>
                          </tr>
                          <tr>
                             <td>Pizza Eduardos</td>
                             <td>04242/219199</td>
                             <td>Irgendwos 23</td>
                          </tr>
                          <tr>
                            <td>Pizza Eduardos</td>
                            <td>04242/219199</td>
                            <td>Irgendwos 23</td>
                          </tr>
                          <tr>
                            <td>Pizza Eduardos</td>
                            <td>04242/219199</td>
                            <td>Irgendwos 23</td>
                          </tr>
                          <tr>
                            <td>Pizza Eduardos</td>
                            <td>04242/219199</td>
                            <td>Irgendwos 23</td>
                          </tr>
                          <tr>
                              <td>Pizza Eduardos</td>
                              <td>04242/219199</td>
                              <td>Irgendwos 23</td>
                            </tr>
                            <tr>
                            <td>Pizza Eduardos</td>
                            <td>04242/219199</td>
                            <td>Irgendwos 23</td>
                          </tr>
                      </tb>

                    </table>
                </div>
            </div>

            <div style="clear: both;">
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <p><h3>Gesamtpreis Bestellung</h3> <input type="text" style="padding: 10px"/></p><br/>
            </div>

        </div>


    </div>
    <div style="padding-top: 10px; clear: both;">
    <h3>Artikel</h3>
    <p>
    <div style="height: 200px; width: 100%; overflow: auto;">
        <div style="height: 250px;">
            <table width="100%;">
                <th><b>Artikel-Nr</b></th>
                <th><b>Artikelbezeichnung</b></th>
                <th><b>Einzelpreis</b></th>
                <th><b>Menge</b></th>
                <th><b>Rabatt</b></th>
                <th><b>Summe</b></th>
              <tr>
                <td>0001</td>
                <td>Pizza</td>
                <td>10</td>
                <td>1</td>
                <td>0</td>
                <td>10</td>
              </tr>
              <tr>
                  <td>0001</td>
                  <td>Pizza</td>
                  <td>10</td>
                  <td>1</td>
                  <td>0</td>
                  <td>10</td>
                </tr>

             <tr>
                 <td>0001</td>
                 <td>Pizza</td>
                 <td>10</td>
                 <td>1</td>
                 <td>0</td>
                 <td>10</td>
               </tr>

               <tr>
                   <td>0001</td>
                   <td>Pizza</td>
                   <td>10</td>
                   <td>1</td>
                   <td>0</td>
                   <td>10</td>
                 </tr>
                 <tr>
                    <td>0001</td>
                    <td>Pizza</td>
                    <td>10</td>
                    <td>1</td>
                    <td>0</td>
                    <td>10</td>
                  </tr>
                  <tr>
                     <td>0001</td>
                     <td>Pizza</td>
                     <td>10</td>
                     <td>1</td>
                     <td>0</td>
                     <td>10</td>
                   </tr>
                   <tr>
                      <td>0001</td>
                      <td>Pizza</td>
                      <td>10</td>
                      <td>1</td>
                      <td>0</td>
                      <td>10</td>
                    </tr>
                    <tr>
                       <td>0001</td>
                       <td>Pizza</td>
                       <td>10</td>
                       <td>1</td>
                       <td>0</td>
                       <td>10</td>
                     </tr>
                  <tr>
                    <td>0001</td>
                    <td>Pizza</td>
                    <td>10</td>
                    <td>1</td>
                    <td>0</td>
                    <td>10</td>
                  </tr>
                  <tr>
                     <td>0001</td>
                     <td>Pizza</td>
                     <td>10</td>
                     <td>1</td>
                     <td>0</td>
                     <td>10</td>
                   </tr>
                   <tr>
                      <td>0001</td>
                      <td>Pizza</td>
                      <td>10</td>
                      <td>1</td>
                      <td>0</td>
                      <td>10</td>
                    </tr>
                    <tr>
                       <td>0001</td>
                       <td>Pizza</td>
                       <td>10</td>
                       <td>1</td>
                       <td>0</td>
                       <td>10</td>
                     </tr>
                     <tr>
                        <td>0001</td>
                        <td>Pizza</td>
                        <td>10</td>
                        <td>1</td>
                        <td>0</td>
                        <td>10</td>
                      </tr>
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


@stop
