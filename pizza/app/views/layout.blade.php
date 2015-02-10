<!DOCTYPE html>
<html>
<head>


<title>{{--$title--}}Pizzaservice</title>
{{ HTML::style('css/bootstrap.min.css') }}

{{ HTML::style('css/style.css'); }}
{{ HTML::script('/js/jquery-1.11.2.min.js') }}
{{ HTML::script('/js/bootstrap.min.js') }}


@yield('head')

</head>

    <body>
        <div style="float: left; padding-right: 5px;position: absolute;margin-left: 3em;">
            <a href="/" >{{HTML::image('/img/fallback-start_edited.png','Eduardo Logo',array('width' => '150','height' => '150'))}}</a>
        </div>
        <div class="head" >
            <div style="padding-left: 150px;" class="navbar navbar-static-top">
                <div class="container">
                    <a href="/" style="margin-left: 3em;" class="navbar-brand">Eduardos Pizza Service GmbH</a>
                </div>
            </div>
        </div>
        <br />
        <br />
        <br />

        {{--<div style="padding: 0 15%; position: center;">--}}
        <div class="container">
        @yield('content')
        </div>

    </body>

</html>