@extends('templates.default')
@section('content')

    <div class="formCad" ng-controller="cadUserCtrl">
        <h2>Cadastro de Usuário</h2></br>

        <?php
        echo Form::open(array('name' => 'cadForm', 'url' => 'store', 'method' => 'POST'));

        echo Form::label('username', 'Usuário') . '<br/>';
        echo Form::text('username', '', array('ng-required' => 'true',
                        'class' => 'form-control',
                        'placeholder' => 'Digite um nome de usuário',
                        'ng-model' => 'user.username',
                        'ng-show' => 'true'
                )) . '<br/>';

        echo Form::label('name', 'Nome') . '<br/>';
        echo Form::text('name', '', array('ng-required' => 'true',
                        'class' => 'form-control',
                        'placeholder' => 'Digite seu nome',
                        'ng-model' => 'user.name'
                )) . '<br/>';

        echo Form::label('email', 'Email') . '<br/>';
        echo Form::email('email', '', array('ng-required' => 'true',
                        'class' => 'form-control',
                        'placeholder' => 'Digite seu email',
                        'ng-model' => 'user.email')) . '<br/>';

        echo Form::label('cpf', 'CPF') . '<br/>';
        echo Form::text('cpf', '', array('class' => 'form-control',
                        'placeholder' => 'Digite seu CPF',
                        'ng-model' => 'user.cpf',
                        'ng-maxlength' => '4',
                        'mask' => '999.999.999-99',
                    //'ng-pattern'=>'/\d{1}-\d{3}/'
                )) . '<br/>';

        echo Form::label('rg', 'RG') . '<br/>';
        echo Form::text('rg', '', array('class' => 'form-control',
                        'placeholder' => 'Digite seu RG',
                        'ng-model' => 'user.rg')) . '<br/>';

       // echo Form::label('birthDate', 'Data de Nascimento (dd/mm/aaaa)') . '<br/>';
       // echo Form::date('birthDate', '', array('ng-required' => 'true',
       //                 'class' => 'form-control',
       //                 'placeholder' => 'Digite a data de nascimento',
       //                 'ng-model' => 'user.birthDate',
       //         )) . '<br/>';

        echo '<div class="form-control">';
        echo Form::checkbox('graduated', 'value', false, array('ng-model' => 'user.graduated')) . ' ';
        echo Form::label('graduated', 'É formado na área?') . '<br/>' . '<br/>';
        echo '</div>' . '</br>';

        echo Form::label('yearCourse', 'Ano de Formação') . '<br/>';
        echo Form::number('yearCourse', '', array(
                        'class' => 'form-control',
                        'placeholder' => 'Diite o ano da ultima formação',
                        'ng-model' => 'user.yearCourse',
                        'ng-disabled' => '!user.graduated',
                )) . '<br/>';

        echo '<div ng-show="admin()">';
        echo Form::label('accessLevel', 'Nivel de Acesso') . '<br/>';
        echo Form::number('accessLevel', '', array(
                        'class' => 'form-control',
                        'placeholder' => 'Defina o nivel de acesso',
                        'ng-model' => 'user.accessLevel'
                )) . '<br/>';
        echo '</div>';

        echo Form::label('password', 'Senha') . '<br/>';
        echo Form::password('password', array(
                        'ng-required' => 'true',
                        'class' => 'form-control',
                        'placeholder' => 'Defina sua senha',
                        'ng-model' => 'user.password'
                )) . '<br/>';

        echo Form::label('passwordConf', 'Confirmar Senha') . '<br/>';
        echo Form::password('passwordConf', array(
                        'class' => 'form-control',
                        'placeholder' => 'Digite sua senha novamente',
                        'ng-model' => 'user.passwordConf'
                )) . '<br/>';


        echo Form::submit('Enviar', array('class' => 'btn btn-primary btn-block', 'ng-disabled' => 'false'));
        echo '</br>';
        echo Form::submit('Cadastrar Repositório!', array('class' => 'btn btn btn-success btn-block btn-block', 'ng-disabled' => 'true'));
        echo Form::close();
        echo '</br>';

       // echo link_to_route('user.userrepository', $title = 'Cadastrar Repositório!', $parameters = array(), $attributes = array(
       //         'class' => 'btn btn-success btn-block',
       //         'method'=>'post'));
        echo '</br>';


      //  echo Form::submit('Cadastrar Repositório', array(
      //          'ng-disabled' => 'true',
      //          'ng-click' => 'add()',
      //          'class' => 'btn btn-success btn-block'));
      //  echo '</br>';


        echo Form::close();

        ?>
    </div>
@stop