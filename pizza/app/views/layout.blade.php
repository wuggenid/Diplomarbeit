<!DOCTYPE html>
<html>
<head>
<title>{{$title}}</title>
{{ HTML::style('css/style.css'); }}
</head>

    <body>
        <div class="head">
            <h1>Eduardos Pizza Service GmbH</h1>
            <p>{{ date('d/m/y') }}</p>
            <p>Tel.: 04242 / 21 91 99</p><br/>
        </div>

        @yield('content')

    </body>
</html>