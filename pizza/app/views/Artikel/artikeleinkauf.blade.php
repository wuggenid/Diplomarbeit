@extends('...layout')

@section('content')

@if ($alert = Session::get('alert'))
  <div class="alert alert-warning">
      {{ $alert }}
  </div>
@endif

<h2>Artikeleinkaufsverwaltung</h2>

<div style="width:50%; float: left; padding-top: 20px; padding-left: 5%; ">
    <table class="scroll" style="width: 100%;">
        <thead>
            <tr>
                <th width="25%" id="aid" style="text-align: left; padding-left: 5%;">Art-Nr</th>
                <th id="abez" style="text-align: left;">Bezeichnung</th>
            </tr>
        </thead>
    </table>
    <table id="artikel" style="height: 300px; width: 100%; overflow-y: auto; display: block;">
        <tbody>
            @foreach($articles as $key => $article)
                 <tr class="tablerow" onClick="javascript:selectarticle('{{$article->ANR}}','{{$article->A0}}','{{$article->AG}}', '{{$article->CB}}','{{$article->ASS}}', '{{$article->VGS}}')">
                     <td style="text-align: left; padding-left: 5%;">{{$article->ANR}}</td>
                     <td style="text-align: left; width: 100%; padding-left: 20%;">{{$article->A0}}</td>
                 </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div style="width: 40%; float:right; padding-top: 20px;">
    <ul id="contactform">
        <li>
            <label for="name"> L1-Nr</label><br/>
            <span class="fieldbox"><input type="text" id="l1nr"/></span>
        </li>
        <li>
            <label for="name"> L1-Name</label><br/>
            <span class="fieldbox"><input type="text" id="l1name"/></span>
        </li>
        <li>
            <label for="email"> L1-Preis</label><br/>
            <span class="fieldbox"><input type="text" id="l1preis"/></span>
        </li>
        <li>
            <label for="contact"> L1-letzter Kauf</label><br/>
            <span class="fieldbox"><input type="text" id="l1letzterkauf"/></span>
        </li>
    </ul>
</div>


<div style="clear: both;">
    <br/><br/>

    <a href="/"><button style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <button onclick="javascript:savearticle()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Speichern</button>
    <br/><br/>
</div>


@stop