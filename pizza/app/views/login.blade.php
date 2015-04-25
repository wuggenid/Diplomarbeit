@extends('layout')

@section('content')

<h2>Login</h2>
<div style="padding: 5px 30px;">

    <div class="chosen-container chosen-container-multi">
        <form action="{{ url('login') }}" method="post">
            <div class="wrapper">
                <form class="form-signin">
                    <input type="password" name="password" required autofocus/>
                    <button class="btn btn-lg btn-primary" type="submit">Login</button>
                </form>
            </div>
        </form>
    </div>
</div>
@stop