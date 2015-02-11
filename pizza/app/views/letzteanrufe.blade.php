@extends('layout')

@section('content')

<h2>Letzte Anrufe</h2>

<table class="table">
    <thead>
        <tr>
            <th>Anrufername</th>
            <th>Telefonnummer</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $anrufe = DB::table('xstamm')->take(15)->orderBy('RZT','desc')->get();
            $kunden = array();
            for($i = 0;$i<15;$i++)
            {
                $kunden[$i] = DB::table('xadress')->where('TEL','=',$anrufe[$i]->TEL)->get();
            }
        ?>
        @for ($i = 0;$i<15;$i++)
            <tr>
                <td>{{$kunden[$i][0]->NA1." ".$kunden[$i][0]->NA2}}</td>
                <td>{{$anrufe[$i]->TEL}}</td>
            </tr>
        @endfor
    </tbody>
</table>

@stop