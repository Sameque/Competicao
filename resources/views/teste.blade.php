@extends('templates.default')

@section('content')

    <h1>teste_</h1>

    <div class="teste" ng-controller="updateCtrl">

        <% $user %>
        </br>
        {{user}} </br>

            <input checked="checked" value="value" type="checkbox" class="ng-pristine ng-untouched ng-valid">

        <?php

        echo Form::open(['route' => ['update.user', $user->id], 'method' => 'PUT']);

                echo Form::label('name', 'Usuário') . '<br/>';
                echo Form::text('name', null, array('ng-required' => 'true',
                                'class' => 'form-control',
                                'placeholder' => 'Digite um nome de usuário',
                                'ng-model' => 'user.username',
                                'ng-show' => 'true'
                        )) . '<br/>';

                echo '<div class="form-control">';
                echo Form::checkbox('graduated', 'value', false, array(
                                'checked'=>'checked',
                                //'ng-checked'=>'false',
                                'value'=>'value',
                                'ng-model' => 'user.graduated',
                        )) . ' ';
                echo Form::label('graduated', 'É formado na área?') . '<br/>' . '<br/>';
                echo '</div>' . '</br>';

                echo Form::label('password', 'Senha') . '<br/>';
                echo Form::password('password', array('ng-required' => 'true',
                                'class' => 'form-control',
                                'placeholder' => 'Defina sua senha',
                                'ng-model' => 'user.password'
                        )) . '<br/>';

                // echo Form::label('passwordConf', 'Confirmar Senha') . '<br/>';
                // echo Form::password('passwordConf',array('size' => '10', 'class' => 'form-control')) . '<br/>';


                echo Form::submit('Enviar', array('class' => 'btn btn-primary btn-block', 'ng-disabled' => 'false'));

        echo Form::close();
        ?>
    </div>

@stop