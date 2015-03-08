@extends('...layout')

@section('head')

@section('content')

@if ($alert = Session::get('alert'))
  <div class="alert alert-warning">
      {{ $alert }}
  </div>
@endif

<h2>Personalverwaltung</h2>
<div style="padding: 10px 30px;">

    <div style="width:65%; float: left; padding: 50px 5%; ">
        <div class="chosen-container chosen-container-multi">
            <label>Personal - Name:</label>
            <ul style="list-style: none;" class="chosen-choices">
                <li class="search-field">
                    <input type="text" id="tels" class="default" oninput="javascript:telInput(this)" onkeydown="javascript:telKeyPress(this)" /><button type="button" id="aufk" onclick="toggle(this);"/><span id="aufks" class="glyphicon glyphicon-chevron-down"></span>
                </li>
            </ul>
        </div>

        <table class="scroll" style="width: 100%;">
            <thead>
                <tr>
                    <th width="25%" id="aid" style="text-align: left; padding-left: 5%;">Kürzel</th>
                    <th id="abez" style="text-align: left;">Name</th>
                    <th style="text-align: left;">Straße</th>
                </tr>
            </thead>
        </table>
        <table id="artikel" style="height: 300px; width: 100%; overflow-y: auto; display: block;">
            <tbody>
                @foreach($personal as $key => $person)
                     <tr class="tablerow" onClick="javascript:selectpersonal('{{$person->PKZ}}','{{$person->VNAM}}','{{$person->NNAM}}', '{{$person->PSTR}}','{{$person->PORT}}', '{{$person->PTEL}}', '{{$person->SOZNR}}', '{{$person->GEBTAG}}', '{{$person->EIN}}', '{{$person->AUS}}', '{{$person->LOHN}}', '{{$person->KONTO}}', '{{$person->BANK}}', '{{$person->URLAUB}}', '{{$person->KRANK}}', '{{$person->MEMO}}')">
                         <td style="text-align: left; padding-left: 5%;">{{$person->PKZ}}</td>
                         <td style="text-align: left; width: 62%; padding-left: 20%;">{{$person->VNAM}} {{$person->NNAM}}</td>
                         <th style="text-align: left; width: 38%;">{{$person->PSTR}}</th>
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div style="width:45%; float: left;">
        <ul id="contactform">
            <li>
                <label for="name"> Vorname </label><br/>
                <span class="fieldbox"><input type="text" name="vname" id="vname"/></span>
            </li>
            <li>
                <label for="name"> Nachname </label><br/>
                <span class="fieldbox"><input type="text" name="nname" id="nname"/></span>
            </li>
            <li>
                <label for="name"> Kurzzeichen </label><br/>
                <span class="fieldbox"><input type="text" name="kz" id="kz"/></span>
            </li>
            <li>
                <label for="contact"> Adresse</label><br/>
                <span class="fieldbox"><input type="text" name="add" id="add"/></span>
            </li>
            <li>
                <label for="contact"> Ort</label><br/>
                <span class="fieldbox"><input type="text" name="ort" id="ort"/></span>
            </li>
            <li>
                <label for="email"> Telefon</label><br/>
                <span class="fieldbox"><input type="text" name="tel" id="tel"/></span>
            </li>
            <li>
                <label for="email"> Sozialversicherungs-Nummer</label><br/>
                <span class="fieldbox"><input type="text" name="soz" id="soz"/></span>
            </li>
            <li>
                <label for="email"> Geburtstag (JJJJ-MM-TT)</label><br/>
                <span class="fieldbox"><input type="text" name="geb" id="geb"/></span>
            </li>
        </ul>
    </div>


    <div style="width:45%; float: right;">
        <ul id="contactform">
            <li>
                <label for="email"> Eintrittsdatum (JJJJ-MM-TT)</label><br/>
                <span class="fieldbox"><input type="text" name="edat" id="edat"/></span>
            </li>
            <li>
                <label for="email"> Austrittsdatum (JJJJ-MM-TT)</label><br/>
                <span class="fieldbox"><input type="text" name="adat" id="adat"/></span>
            </li>
            <li>
                <label for="email"> Lohn/Gehalt</label><br/>
                <span class="fieldbox"><input type="text" name="lohn" id="lohn"/></span>
            </li>
            <li>
                <label for="email"> Kontonummer</label><br/>
                <span class="fieldbox"><input type="text" name="konto" id="konto"/></span>
            </li>
            <li>
                <label for="email"> Bankverbindung</label><br/>
                <span class="fieldbox"><input type="text" name="bank" id="bank"/></span>
            </li>
            <li>
                <label for="email"> Urlaubstage</label><br/>
                <span class="fieldbox"><input type="text" name="utag" id="utag"/></span>
            </li>
            <li>
                <label for="email"> Kranktage</label><br/>
                <span class="fieldbox"><input type="text" name="ktag" id="ktag"/></span>
            </li>
            <li>
                <label for="msg"> Memo</label><br/>
                <span class="msgbox"><textarea class="area" id="memo" name="memo" rows="8" cols="30" style="resize: none;"></textarea></span>
            </li>
        </ul>
    </div>
</div>


<div style="clear: both;">
    <br/><br/>
    <button onclick="javascript:deletepersonal()" style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span> Personal löschen </button>
    <button onclick="javascript:newpersonal()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-plus"></span> Neues Personal </button>
    <a href="/"><button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Etikettendruck </button></a>
    <br/><br/>
    <a href="/"><button style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück </button></a>
    <button onclick="javascript:savepersonal()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Personal speichern</button>
    <button style="width: 15em;" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-print"></span> Personalliste drucken </button>
    <br/><br/>
</div>





    <script language="javascript">

        var newpers = false;
        var selectpers = false;

        kz.value = vname.value = nname.value = add.value = ort.value = tel.value = geb.value = edat.value = adat.value = konto.value = bank.value = memo.value = '';
        soz.value = lohn.value = utag.value = ktag.value = '0';
        newpers = true;
        selectpers = false;
        document.getElementById('vname').focus();

        function selectpersonal(pkz ,vnam, nnam, pstr, port, ptel, soznr, gebtag, ein, aus, lo, ko, ba, urlaub, krank, mem)
        {
            kz.value = pkz;
            $id = pkz;

            vname.value = vnam;
            nname.value = nnam;
            add.value = pstr;
            ort.value = port;
            tel.value = ptel;
            soz.value = soznr;
            geb.value = gebtag;
            edat.value = ein;
            adat.value = aus;
            lohn.value = lo;
            konto.value = ko;
            bank.value = ba;
            utag.value = urlaub;
            ktag.value = krank;
            memo.value = mem;

            newpers = false;
            selectpers = true;
        }

        function newpersonal()
        {
            kz.value = vname.value = nname.value = add.value = ort.value = tel.value = geb.value = edat.value = adat.value = konto.value = bank.value = memo.value = '';
            soz.value = lohn.value = utag.value = ktag.value = '0';
            newpers = true;
            selectpers = false;
            document.getElementById('vname').focus();
        }

        function deletepersonal()
        {
            if(newpers == false && selectpers == true)
            {
                if($id == kz.value)
                {
                    window.location.href = "/Personal/delete/" + $id;
                }

                // Wenn die ID zwischenzeitig verändert wurde, darf er nichts löschen!
                else
                    alert("Nicht möglich, weil die Personalnummer zwischenzeit geändert wurde");
            }

            else
                alert("Kein Personal ausgewählt");

        }

        function savepersonal()
        {
            //Personalveränderung
            //auch ID kann geändert werden
            //kann keine andere ID überspeichern
            if(newpers == false && selectpers == true)
            {
                $nid = kz.value;
                $vname = vname.value;
                $nname = nname.value;
                $add = add.value;
                $ort = ort.value;
                $tel = tel.value;
                $soz = soz.value;
                $geb = geb.value;
                $edat = edat.value;
                $adat = adat.value;
                $lohn = lohn.value;
                $konto = konto.value;
                $bank = bank.value;
                $utag = utag.value;
                $ktag = ktag.value;
                $memo = memo.value;

                window.location.href = "/Personal/update?oldID=" + $id
                        + "&nid=" + $nid
                        + "&vname=" + $vname
                        + "&nname=" + $nname
                        + "&add=" + $add
                        + "&ort=" + $ort
                        + "&tel=" + $tel
                        + "&soz=" + $soz
                        + "&geb=" + $geb
                        + "&edat=" + $edat
                        + "&adat=" + $adat
                        + "&lohn=" + $lohn
                        + "&konto=" + $konto
                        + "&bank=" + $bank
                        + "&utag=" + $utag
                        + "&ktag=" + $ktag
                        + "&memo=" + $memo;
            }

            //Neues Personal
            else if(newpers == true && selectpers == false)
            {
                $id = kz.value;

                $vname = vname.value;
                $nname = nname.value;
                $add = add.value;
                $ort = ort.value;
                $tel = tel.value;
                $soz = soz.value;
                $geb = geb.value;
                $edat = edat.value;
                $adat = adat.value;
                $lohn = lohn.value;
                $konto = konto.value;
                $bank = bank.value;
                $utag = utag.value;
                $ktag = ktag.value;
                $memo = memo.value;

                window.location.href = "/Personal/store"
                        + "?id=" + $id
                        + "&vname=" + $vname
                        + "&nname=" + $nname
                        + "&add=" + $add
                        + "&ort=" + $ort
                        + "&tel=" + $tel
                        + "&soz=" + $soz
                        + "&geb=" + $geb
                        + "&edat=" + $edat
                        + "&adat=" + $adat
                        + "&lohn=" + $lohn
                        + "&konto=" + $konto
                        + "&bank=" + $bank
                        + "&utag=" + $utag
                        + "&ktag=" + $ktag
                        + "&memo=" + $memo;
            }

            else
                alert("Personal konnte nicht gespeichert werden!");
        }

    </script>
@stop