@extends('...layout')

@section('content')

<h2>Tagessumme</h2>

<select id="dates" size="10" onchange="dateSelect(this.selectedIndex);" style="float: right; width: 15em;">
    @foreach($dates as $date)
        <option>{{date('d.m.Y',strtotime($date->DAT))}}</option>
    @endforeach
</select>
<select id="fahrer" size="10" onchange="fahrerSelect(this.selectedIndex);" style="float: right; width: 15em; display: none;">
    @foreach($personal as $person)
        <option pkz="{{$person['PKZ']}}" vnam="{{$person['VNAM']}}" nnam="{{$person['NNAM']}}">{{$person['VNAM']." ".$person['NNAM']." ".$person['PKZ']}}</option>
    @endforeach
</select>
<div style="padding: 5px 30px;">
    <table>
        <tbody>
            <tr>
                <th>R-Datum:</th>
                <th><input onfocus="javscript:dateFocus()" type="text" id="date" /></th>
            </tr>
            <tr>
                <th>Fahrer-Nr.:</th>
                <th><input onfocus="javascript:fahrerFocus()" type="text" id="pkz" /></th>
            </tr>
            <tr>
                <th>Fahrer:</th>
                <th><input type="text" id="fname" disabled/></th>
            </tr>
        </tbody>
    </table>
</div>

<style type="text/css">
    TABLE TBODY TR TH INPUT
    {
        width: 10em;
    }
</style>
<script>
    $('#pkz').keydown(function(e)
    {
        if (e.which == 13)
        {
            if ($("[pkz="+$(this).val()+"]").val()) //If there is a driver with this pkz
            {
                var selectedOption = $("[pkz="+$(this).val()+"]")[0];
                var fahrerName = selectedOption.getAttribute('vnam') + " " + selectedOption.getAttribute('nnam');
                document.getElementById('fname').value = fahrerName;
            }
            else
            {
                alert('Dieser Fahrer wurde leider nicht gefunden! Bitte geben sie ein anderes Kürzel ein oder wählen Sie eines aus der Liste aus.');
            }
        }
    });
    function dateSelect(selectedIndex)
    {
        document.getElementById('date').value = document.getElementById('dates').options[selectedIndex].text;
    }
    function fahrerSelect(selectedIndex)
    {
        var selectedOption = document.getElementById('fahrer').options[selectedIndex];
        document.getElementById('pkz').value = selectedOption.getAttribute('pkz');
        var fahrerName = selectedOption.getAttribute('vnam') + " " + selectedOption.getAttribute('nnam');
        document.getElementById('fname').value = fahrerName;
    }
    function dateFocus()
    {
        document.getElementById('fahrer').style.display = "none";
        document.getElementById('dates').style.display = "";
    }
    function fahrerFocus()
    {
        document.getElementById('dates').style.display = "none";
        document.getElementById('fahrer').style.display = "";
    }
</script>

@stop