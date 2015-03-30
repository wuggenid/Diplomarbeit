@extends('...layout')

@section('content')

@if ($alert = Session::get('alert'))
  <div class="alert alert-warning">
      {{ $alert }}
  </div>
@endif

<h2>Artikeleinkaufsverwaltung</h2>

<div style="width:50%; padding-top: 20px;">
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
                 <tr class="tablerow" onClick="javascript:findarticle('{{$article->ANR}}')">
                     <td style="text-align: left; padding-left: 5%;">{{$article->ANR}}</td>
                     <td style="text-align: left; width: 100%; padding-left: 20%;">{{$article->A0}}</td>
                 </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div width="100%" style="padding-top: 30px;">
    <table>
        <thead>
            <tr>
                <th>Lieferant 1</th>
                <th>Lieferant 2</th>
                <th>Lieferant 3</th>
                <th>Lieferant 4</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <ul id="contactform">
                    <li>
                        <label for="name"> L1-Nr</label><br/>
                        <span class="fieldbox"><input type="text" id="l1nrE"/></span>
                    </li>
                    <li>
                        <label for="name"> L1-Name</label><br/>
                        <span class="fieldbox"><input type="text" id="l1nameE"/></span>
                    </li>
                    <li>
                        <label for="email"> L1-Preis</label><br/>
                        <span class="fieldbox"><input type="text" id="l1preisE"/></span>
                    </li>
                    <li>
                        <label for="contact"> L1-Letzter Kauf</label><br/>
                        <span class="fieldbox"><input type="text" id="l1datE"/></span>
                    </li>
                </ul>
            </td>
            <td>
                <ul id="contactform">
                    <li>
                        <label for="name"> L2-Nr</label><br/>
                        <span class="fieldbox"><input type="text" id="l2nrE"/></span>
                    </li>
                    <li>
                        <label for="name"> L2-Name</label><br/>
                        <span class="fieldbox"><input type="text" id="l2nameE"/></span>
                    </li>
                    <li>
                        <label for="email"> L2-Preis</label><br/>
                        <span class="fieldbox"><input type="text" id="l2preisE"/></span>
                    </li>
                    <li>
                        <label for="contact"> L2-Letzter Kauf</label><br/>
                        <span class="fieldbox"><input type="text" id="l2datE"/></span>
                    </li>
                </ul>
            </td>
            <td>
                <ul id="contactform">
                    <li>
                        <label for="name"> L3-Nr</label><br/>
                        <span class="fieldbox"><input type="text" id="l3nrE"/></span>
                    </li>
                    <li>
                        <label for="name"> L3-Name</label><br/>
                        <span class="fieldbox"><input type="text" id="l3nameE"/></span>
                    </li>
                    <li>
                        <label for="email"> L3-Preis</label><br/>
                        <span class="fieldbox"><input type="text" id="l3preisE"/></span>
                    </li>
                    <li>
                        <label for="contact"> L3-Letzter Kauf</label><br/>
                        <span class="fieldbox"><input type="text" id="l3datE"/></span>
                    </li>
                </ul>
            </td>
            <td>
                <ul id="contactform">
                    <li>
                        <label for="name"> L4-Nr</label><br/>
                        <span class="fieldbox"><input type="text" id="l4nrE"/></span>
                    </li>
                    <li>
                        <label for="name"> L4-Name</label><br/>
                        <span class="fieldbox"><input type="text" id="l4nameE"/></span>
                    </li>
                    <li>
                        <label for="email"> L4-Preis</label><br/>
                        <span class="fieldbox"><input type="text" id="l4preisE"/></span>
                    </li>
                    <li>
                        <label for="contact"> L4-Letzter Kauf</label><br/>
                        <span class="fieldbox"><input type="text" id="l4datE"/></span>
                    </li>
                </ul>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<div style="clear: both;">
    <br/><br/>

    <a href="/"><button style="width: 15em;" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Zurück</button></a>
    <button onclick="javascript:savearticle()" style="width: 15em;" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Speichern</button>
    <br/><br/>
</div>



<script language="javascript">

    function findarticle(anr)
    {
        var xhr = new XMLHttpRequest();
        (xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                var articlesEK = JSON.parse(xhr.responseText);
                    selectartikeleinkauf(articlesEK[0]['L1NR'], articlesEK[0]['L1PREIS'], articlesEK[0]['L1DAT'],
                                        articlesEK[0]['L2NR'], articlesEK[0]['L2PREIS'], articlesEK[0]['L2DAT'],
                                        articlesEK[0]['L3NR'], articlesEK[0]['L3PREIS'], articlesEK[0]['L3DAT'],
                                        articlesEK[0]['L4NR'], articlesEK[0]['L4PREIS'], articlesEK[0]['L4DAT']);
            }
        })
        xhr.open('GET', '/api/getArtikelEK?artikelek=' + anr, true);
        xhr.send();
    }

    function selectartikeleinkauf(l1nr, l1preis, l1dat, l2nr, l2preis, l2dat, l3nr, l3preis, l3dat, l4nr, l4preis, l4dat)
    {
        l1nrE.value = l1nr;
        l1preisE.value = l1preis;
        l1datE.value = l1dat;

        l2nrE.value = l2nr;
        l2preisE.value = l2preis;
        l2datE.value = l2dat;

        l3nrE.value = l3nr;
        l3preisE.value = l3preis;
        l3datE.value = l3dat;

        l4nrE.value = l4nr;
        l4preisE.value = l4preis;
        l4datE.value = l4dat;
    }



</script>

@stop