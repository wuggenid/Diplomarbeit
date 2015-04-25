@extends('...layout')

@section('head')
{{ HTML::style('css/chosen.css') }}

@section('content')

@if ($alert = Session::get('alert'))
  <div class="alert alert-warning">
      {{ $alert }}
  </div>
@endif

<h2>Personalverwaltung</h2>
<div class="content">

    <div style="width:65%; float: left; padding: 50px 5%; ">
        <div class="chosen-container chosen-container-multi">
            <label>Personalname:</label>
            <ul style="list-style: none;" class="chosen-choices">
                <li class="search-field">
                    <input type="text" id="names" class="default" oninput="javascript:nameInput(this)" onkeydown="javascript:nameKeyPress(this)" />
                    <button type="button" id="aufk" onclick="toggle(this);"/><span id="aufks" class="glyphicon glyphicon-chevron-down"></span>
                </li>
            </ul>
        </div>

        <table id="table1" style="max-height: 300px; width: 100%; overflow-y: auto; display: none;">
            <tbody class="tablerow">
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

<p>
    <br/>
    {{ Form::open(array('url' => '/logout/')) }}
    {{ Form::hidden('_method', 'GET') }}
    {{ Form::submit('Logout', array('class' => 'btn btn-danger'))}}
    {{ Form::close()}}
</p>





<script language="javascript">

    var newpers = false;
    var selectpers = false;

    kz.value = vname.value = nname.value = add.value = ort.value = tel.value = geb.value = edat.value = adat.value = konto.value = bank.value = memo.value = '';
    soz.value = lohn.value = utag.value = ktag.value = '0';
    newpers = true;
    selectpers = false;
    document.getElementById('names').focus();

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
        names.value = kz.value = vname.value = nname.value = add.value = ort.value = tel.value = geb.value = edat.value = adat.value = konto.value = bank.value = memo.value = '';
        soz.value = lohn.value = utag.value = ktag.value = '0';
        newpers = true;
        selectpers = false;
        document.getElementById('kz').style.backgroundColor = "#FFF";
        document.getElementById('table1').style.display="none";
        document.getElementById('aufks').className = "glyphicon glyphicon-chevron-down";
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


    //Tabelle aus- und einklappen
    function toggle(cell) {
        if(document.getElementById('table1').style.display == "none") {
            document.getElementById('table1').style.display="table";
            document.getElementById('aufks').className = "glyphicon glyphicon-chevron-up";
        }

        else {
            document.getElementById('table1').style.display="none";
            document.getElementById('aufks').className = "glyphicon glyphicon-chevron-down";
        }
    }


    function nameInput()
    {
        check = 0;
        selectedName = 1;
        document.getElementById('names').style.backgroundColor = "white";
        var name = document.getElementById('names').value;
            var xhr = new XMLHttpRequest();
            (xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    var names = JSON.parse(xhr.responseText);
                    if (names.length <= 1)
                    {
                        document.getElementById('kz').value = $id = names[0]['PKZ'];
                        document.getElementById('kz').style.backgroundColor = "#3F3";

                        document.getElementById('vname').value = names[0]['VNAM'];
                        document.getElementById('nname').value = names[0]['NNAM'];
                        document.getElementById('add').value = names[0]['PSTR'];
                        document.getElementById('ort').value = names[0]['PORT'];
                        document.getElementById('tel').value = names[0]['PTEL'];
                        document.getElementById('soz').value = names[0]['SOZNR'];
                        document.getElementById('geb').value = names[0]['GEBTAG'];
                        document.getElementById('edat').value = names[0]['EIN'];
                        document.getElementById('adat').value = names[0]['AUS'];
                        document.getElementById('lohn').value = names[0]['LOHN'];
                        document.getElementById('konto').value = names[0]['KONTO'];
                        document.getElementById('bank').value = names[0]['BANK'];
                        document.getElementById('utag').value = names[0]['URLAUB'];
                        document.getElementById('ktag').value = names[0]['KRANK'];
                        document.getElementById('memo').value = names[0]['MEMO'];
                        newpers = false;
                        selectpers = true;
                    }
                    if (names.length<15)
                    {
                        var table = document.getElementById('table1');
                        while(table.hasChildNodes())
                        {
                           table.removeChild(table.firstChild);
                        }
                        var header = table.createTHead();

                        for (var i = 0;i<names.length;i++)
                        {
                            var row = table.insertRow(0);
                            var pkzCell = row.insertCell(0);
                            pkzCell.innerText = names[i]['PKZ'];
                            var nameCell = row.insertCell(-1);
                            var name = "";
                            if (names[i]['VNAM'] != null && names[i]['VNAM'] != "")
                                name += names[i]['VNAM'];
                            if (names[i]['NNAM'] != null && names[i]['NNAM'] != "")
                                name += " " + names[i]['NNAM'];
                            nameCell.innerText = name;
                            var streetCell = row.insertCell(-1);
                            streetCell.innerText = names[i]['PSTR'];
                            row.className = "tablerow";

                            var rows = document.getElementById('table1').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                            for (i = 0; i < rows.length; i++) {
                                rows[i].onclick = function() {
                                    changeSelectedName(this.rowIndex);
                                }
                            }
                        }

                        header.innerHTML = "<tr><th style=\"text-align: left;\" id=\"toggT\" >Kürzel</th><th style=\"text-align: left;\" id=\"toggN\" >Name</th><th style=\"text-align: left;\" id=\"toggS\">Straße</th></tr>";
                        if(document.getElementById('table1').style.display == "none") {
                            document.getElementById('table1').style.display="table";
                            document.getElementById('aufks').className = "glyphicon glyphicon-chevron-up";
                        }
                    }
                }
            })
            xhr.open('GET', '/api/searchName?name=' + name, true);
            xhr.send(null);
    }

    var selectedName = 1;
    function changeSelectedName(cselectedName)
    {
        var oldSelectedName = selectedName;
        selectedName = cselectedName;
        var table = document.getElementById('table1');
        var rows = table.rows;
        if (selectedName > rows.length-1)
            selectedName--;
        if (selectedName < 1)
            selectedName++;
        rows[oldSelectedName].style.backgroundColor = "";
        rows[selectedName].style.backgroundColor = "#D8D8D8";
        rows[selectedName].style.color = "#333332";
        var kname = rows[selectedName].cells[0].innerText;
        document.getElementById('names').value = kname;
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                var names = JSON.parse(xhr.responseText);
                if (names.length == 1)
                {
                    document.getElementById('kz').value = $id = names[0]['PKZ'];
                    document.getElementById('kz').style.backgroundColor = "#3F3";

                    document.getElementById('vname').value = names[0]['VNAM'];
                    document.getElementById('nname').value = names[0]['NNAM'];
                    document.getElementById('add').value = names[0]['PSTR'];
                    document.getElementById('ort').value = names[0]['PORT'];
                    document.getElementById('tel').value = names[0]['PTEL'];
                    document.getElementById('soz').value = names[0]['SOZNR'];
                    document.getElementById('geb').value = names[0]['GEBTAG'];
                    document.getElementById('edat').value = names[0]['EIN'];
                    document.getElementById('adat').value = names[0]['AUS'];
                    document.getElementById('lohn').value = names[0]['LOHN'];
                    document.getElementById('konto').value = names[0]['KONTO'];
                    document.getElementById('bank').value = names[0]['BANK'];
                    document.getElementById('utag').value = names[0]['URLAUB'];
                    document.getElementById('ktag').value = names[0]['KRANK'];
                    document.getElementById('memo').value = names[0]['MEMO'];
                    newpers = false;
                    selectpers = true;
                }
            }
        })
        xhr.open('GET', '/api/searchKName?kname=' + kname, true);
        xhr.send();
    }

    var check = 0;
    function nameKeyPress(e)
    {
        if (event.keyCode == 40)
        {
            if(check == 0) {
                changeSelectedName(selectedName);
                check = 1;
            }
            else
                changeSelectedName(selectedName+1);
        }
        else if (event.keyCode == 38)
        {
            changeSelectedName(selectedName-1);
        }
        var kname = document.getElementById('names').value;
        if (event.keyCode == 13)
        {
            var xhr = new XMLHttpRequest();
                (xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        var names = JSON.parse(xhr.responseText);
                        if (names.length == 0)
                        {
                            alert("Personal nicht gefunden!");
                        }
                        else if (names.length == 1)
                        {
                            document.getElementById('table1').style.display="none";
                            document.getElementById('aufks').className = "glyphicon glyphicon-chevron-down";
                            newpers = false;
                            selectpers = true;
                            document.getElementById('vname').focus();
                        }
                    }
                })
                xhr.open('GET', '/api/searchKName?kname=' + kname, true);
                xhr.send(null);
        }
    }


</script>
@stop