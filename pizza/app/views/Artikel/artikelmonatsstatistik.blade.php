@extends('...layout')

@section('content')

<h2>Artikelmonatsstatistik</h2>
<label>Jahr</label>
{{ Form::open(['url' => url('/Artikel/Artikelmonatsstatistik/searchYear'), 'method' => 'post']) }}
{{Form::text('year')}}
{{Form::submit('Suchen')}}
{{ Form::close() }}

<table class="table table-striped table-bordered" id="artikelmontatstable">
    <thead>
        <th style="width:300px;">Artikel</th>
        <th>Jahr</th>
        <th>Jän</th>
        <th>Feb</th>
        <th>Mar</th>
        <th>Apr</th>
        <th>Mai</th>
        <th>Jun</th>
        <th>Jul</th>
        <th>Aug</th>
        <th>Sep</th>
        <th>Okt</th>
        <th>Nov</th>
        <th>Dez</th>
        <th style="width:100px;">Summe</th>
    </thead>
    <body class="monatsstats">
    @foreach($artstats as $key => $am)
        <tr>
            <td style="width:300px; text-align: left;">
                {{$am->ANR}}
                @foreach($articles as $key => $article)
                    @if($article->ANR == $am->ANR)
                        - {{$article->A0}}
                    @endif
            @endforeach</td>
            <td>{{$am->JJJJ}}</td>
            <td>{{$am->M01}}</td>
            <td>{{$am->M02}}</td>
            <td>{{$am->M03}}</td>
            <td>{{$am->M04}}</td>
            <td>{{$am->M05}}</td>
            <td>{{$am->M06}}</td>
            <td>{{$am->M07}}</td>
            <td>{{$am->M08}}</td>
            <td>{{$am->M09}}</td>
            <td>{{$am->M10}}</td>
            <td>{{$am->M11}}</td>
            <td>{{$am->M12}}</td>
            <td>{{$am->MSU}}</td>
        </tr>
    @endforeach
    </body>
</table>
<br/>
<a href="/"><button style="width: 12em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>


@stop