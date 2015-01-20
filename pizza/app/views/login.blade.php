@extends('layout')

@section('content')

<h2>Login</h2>
<div style="padding: 5px 30px;">

    <div class="chosen-container chosen-container-multi">
        <label>Passwort:</label>
        <input type="text" id="passwort" autofocus onkeypress="javscript:passwordKeyPress()"/>
    </div>
</div>
<?php
    $user = new User;
    $user->name = 'Eduardo';
    $user->save();
?>
<script language="javascript">
    function passwordKeyPress()
    {
        if (event.keyCode == 13)
        {

        }
    }
</script>
@stop