@extends('...layout')

@section('content')

<h2>Rechnungen zuordnen</h2>

<select id="fahrer" size="10" style="float: right; width: 15em;">
    @foreach($personal as $person)
        <option>{{$person['VNAM']." ".$person['NNAM']." ".$person['PKZ']}}</option>
    @endforeach
</select>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Rechnungsnr.</th>
            <th>R-Datum</th>
            <th>R-Zeit</th>
            <th>Telefonnummer</th>
            <th>R-Summe</th>
            <th>Fahrer-Id</th>
            <th>Fahrer</th>
        </tr>
    </thead>
    <tbody id="rtable_body">
    @foreach($ohneFahrer as $key => $of)
        <tr>
            <th><input type="text" class="rnr" value="{{$of->RNR}}" disabled/></th>
            <th><input type="text" class="rdate" value="{{date('d.m.Y',strtotime($of->RDT))}}" disabled/></th>
            <th><input type="text" class="rtime" value="{{explode(' ',$of->RZT)[1]}}" disabled/></th>
            <th><input type="text" class="tel" value="{{$of->TEL}}" disabled/></th>
            <th><input type="text" class="rsum" value="{{$of->RSU}}" disabled/></th>
            <th><input type="text" class="driverid" value="{{$of->FAHR}}"/></th>
            <th><input type="text" class="driver" disabled/></th>
        </tr>
    @endforeach
    </tbody>
</table>
<br /><br /><br /><br /><br />
<a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
<a id="b_button" href="/"><button type="button" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-save"></span> Bestätigen</button></a>
<style type="text/css">
    tbody tr th input
    {
        width: 100%;
        font-weight: normal;
    }
</style>
<script language="javascript">
    document.getElementsByClassName('driverid')[0].focus();
    $('.driverid').keydown(function(e)
    {
        var focusNextElement = false;
        if (e.which == 13)
        {
            //Kundennamen eintragen
            var pkz = $(this).val();
            var currentElement = $(this);
            var xhr = new XMLHttpRequest();
            (xhr.onreadystatechange = function()
            {
                if (xhr.readyState == 4)
                {
                    if (xhr.responseText == "[]")
                    {
                        alert('Fahrer nicht gefunden, bitte geben Sie das Fahrerkürzel erneut ein!');
                        currentElement.val("");
                    }
                    else
                    {
                        var personal = JSON.parse(xhr.responseText);
                        if (personal.length > 1)
                        {
                            alert('Fahrerkürzel nicht eindeutig, bitte geben Sie das vollständige Kürzel ein!');
                        }
                        else
                        {
                            var vname = personal[0].VNAM;
                            var nname = personal[0].NNAM;

                            if (!vname)
                                vname = "";
                            else
                                vname += " ";
                            if (nname == null)
                                nname = "";
                            currentElement.closest('tr').find('.driver').val(vname + nname);
                            focusNextElement = true;
                        }
                    }
                }
            })
            xhr.open('GET', '/api/searchKName?kname=' + pkz, false);
            xhr.send(null);

            if (focusNextElement)
            {
                //Zum nächsten Tabellenelement weiterspringen
                var elementCount = $('#rtable_body').children().length;
                var index = $('#rtable_body').children().find('.driverid').index($(this));
                if (index+1 < elementCount)
                {
                    $('#rtable_body').children().find('.driverid')[index+1].focus();
                }
                else
                {
                    $('#b_button').focus();
                }
            }
        }
    });
</script>

@stop