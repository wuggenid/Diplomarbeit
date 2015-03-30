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
        <tr>
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
                console.log($(this).parent().parent().find('.etime').focus());
            }
        }
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
    });
    $('.car').keydown(function(e)
    {
        if (e.which == 13)
        {
            var index = $('#rtable_body').children().find('.car').index($(this));
            $('#rtable_body').children().find('.btime')[index+1].focus();
        }
    });
    function validateTime(time)
    {
        var regexp = /([01][0-9]|[02][0-3]):[0-5][0-9]/;
        var correct = regexp.test(time);
        return correct;
    }
</script>
@stop