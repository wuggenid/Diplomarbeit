@extends('...layout')

@section('content')

<h2>Letzte Anrufe</h2>

<a href="/Bestellungen"> <button style="width: 7em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>

<table class="table">
    <thead>
        <tr>
            <th>Anrufername</th>
            <th>Telefonnummer</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $anrufe = DB::select(DB::raw("SELECT * FROM `xstamm` ORDER BY unix_timestamp(date(RDT)) DESC, time(RZT) DESC LIMIT 15"));
            $kunden = array();
            for($i = 0;$i<15;$i++)
            {
                $kunden[$i] = DB::table('xadress')->where('TEL','=',$anrufe[$i]->TEL)->get();
            }
            $datetime = explode(' ',$anrufe[0]->RDT)[0].' '.explode(' ',$anrufe[0]->RZT)[1];
        ?>
        @for ($i = 0;$i<15;$i++)
            <tr>
                <td>{{$kunden[$i][0]->NA1." ".$kunden[$i][0]->NA2}}</td>
                <td>{{$anrufe[$i]->TEL}}</td>
            </tr>
        @endfor
    </tbody>
</table>
<a href="/Bestellungen"> <button style="width: 7em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
@stop