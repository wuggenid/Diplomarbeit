@extends('...layout')

@section('content')

<h2>Zeiterfassung</h2>

<select id="fahrer" size="10" style="float: right; width: 15em;">
    <?php
        $personPKZ = array();
        $counter = 0;
    ?>
    @foreach($personal as $person)
        <option>{{$person['VNAM']." ".$person['NNAM']." ".$person['PKZ']}}</option>
        <?php
            $personPKZ[$person['PKZ']] = $person['VNAM']." ".$person['NNAM'];
        ?>
    @endforeach
</select>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Fahrer-KZ</th>
            <th>Fahrername</th>
            <th>Datum</th>
            <th>Beginnzeit</th>
            <th>Endezeit</th>
            <th>Auto</th>
        </tr>
    </thead>
    <tbody id="rtable_body">
    @foreach($ohneZeit as $key => $oz)
        <tr class="dataRow">
            <th><input type="text" class="pkz" value="{{$oz->PKZ}}" disabled/></th>
            <th><input type="text" class="name" value="<?php
                                                            if(array_key_exists($oz->PKZ,$personPKZ))
                                                                echo $personPKZ[$oz->PKZ];
                                                        ?>" disabled/></th>
            <th><input type="text" class="date" value="{{date('d.m.Y',strtotime($oz->DAT))}}" disabled/></th>
            <th><input type="text" class="btime" /></th>
            <th><input type="text" class="etime" /></th>
            <th><input type="text" class="car" /></th>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="/"><button type="button" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
<button id="b_button" type="button" class="btn btn-lg btn-success" onclick="javascript:save()"><span class="glyphicon glyphicon-save"></span> Bestätigen</button>
<style type="text/css">
    tbody tr th input
    {
        width: 100%;
        font-weight: normal;
    }
</style>
<script language="javascript">
    document.getElementsByClassName('btime')[0].focus();
    $('.btime').keydown(function(e)
    {
        if (e.which == 13)
        {
            if (!validateTime($(this).val()))
                alert("Bitte geben Sie eine Uhrzeit im Format HH:MM ein! Beispiel: 12:20");
            else
            {
                $(this).parent().parent().find('.etime').focus();
            }
        }
        if (e.which == 27)
            $('#b_button').focus();
    });
    $('.etime').keydown(function(e)
    {
        if (e.which == 13)
        {
            if (!validateTime($(this).val()))
                alert("Bitte geben Sie eine Uhrzeit im Format HH:MM ein! Beispiel: 12:20");
            else
            {
                $(this).parent().parent().find('.car').focus();
            }
        }
        if (e.which == 27)
            $('#b_button').focus();
    });
    $('.car').keydown(function(e)
    {
        if (e.which == 13)
        {
            var index = $('#rtable_body').children().find('.car').index($(this));
            $('#rtable_body').children().find('.btime')[index+1].focus();
        }
        if (e.which == 27)
            $('#b_button').focus();
    });
    function validateTime(time)
    {
        var regexp = /([01][0-9]|[02][0-3]):[0-5][0-9]/;
        var correct = regexp.test(time);
        return correct;
    }
    function save()
    {
        document.getElementById('b_button').innerHTML = "<span class=\"glyphicon glyphicon-save\"></span> Bitte warten...";

        var elements = $('.dataRow');
        for (var i = 0;i < elements.length;i++)
        {
            if ($(elements[i]).find('.btime').val() != "")
            {
                var xhr = new XMLHttpRequest();
                (xhr.onreadystatechange = function()
                {
                    if (xhr.readyState == 4)
                    {
                        window.location.href = "/";
                    }
                })
                var Sdate = $(elements[i]).find('.date').val().split('.');
                var date = + Sdate[2] + "-" + Sdate[1] + "-" + Sdate[0] + " 00:00:00";
                xhr.open('GET', '/Fahrer/storeSingleZeiterfassungValue?btime='+$(elements[i]).find('.btime').val()+
                                                                      '&etime='+$(elements[i]).find('.etime').val()+
                                                                      '&car='+$(elements[i]).find('.car').val()+
                                                                      '&pkz='+$(elements[i]).find('.pkz').val()+
                                                                      '&dat='+ date + " 00:00:00"
                                                                    , true);
                xhr.send(null);
            }
        }
    }
</script>
@stop
