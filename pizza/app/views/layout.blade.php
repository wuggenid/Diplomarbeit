<!DOCTYPE html>
<html>
<head>
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js') }}


<title>{{--$title--}}Pizzaservice</title>
{{ HTML::style('css/bootstrap.min.css') }}

{{ HTML::style('css/style.css'); }}

@yield('head')

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
        {{ HTML::script('/js/bootstrap.min.js') }}
    </body>

</html>