<!DOCTYPE html>
<html>
<head>
<title>{{$title}}</title>
{{ HTML::style('css/bootstrap.min.css') }}
<<<<<<< HEAD
{{-- HTML::style('css/style.css'); --}}
</div>
=======
{{ HTML::style('css/style.css'); }}
>>>>>>> 579b2111119b8d34f36c51292bc481b90baa8926

</head>

    <body>

        <div class="head" style="height: 250px;">
            <div style="float: left;">
                {{HTML::image('/img/fallback-start.png')}}

            <div style="padding-left: 300px;">
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