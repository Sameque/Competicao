@extends('templates.default')
@section('content')

    <div class="formCad" >
        <h2>Cadastro de Usuário</h2></br>
        <?php
        echo Form::model($user,['route' => ['update.user'], 'method' => 'POST']);
        ?>

        @include('templates.registerUser')

        <?php
        echo '<br />';
        echo Form::submit('Enviar', array('class' => 'btn btn-primary btn-block', 'ng-disabled' => 'false'));
        echo Form::close();
        ?>
    </div>
@stop