<!DOCTYPE html>
<html>
<head>
<title>{{--$title--}}Pizzaservice</title>
{{ HTML::style('css/bootstrap.min.css') }}
{{-- HTML::style('css/style.css'); --}}

{{ HTML::style('css/style.css'); }}

</head>

    <body>

        <div class="head" style="height: 150px;">
            <div style="float: left;">
                {{HTML::image('/img/fallback-start.png','Eduardo Logo',array('width' => '150','height' => '150'))}}
            </div>

            <div style="padding-left: 150px;">
                <h1>Eduardos Pizza Service GmbH</h1>
                <p>{{ date('d.m.y') }}</p>
                <p>Tel.: 04242 / 21 91 99</p><br/>
            </div>
        </div>


        {{--<div style="padding: 0 15%; position: center;">--}}
        <div class="container">
        @yield('content')
        </div>
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>