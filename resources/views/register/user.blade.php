@extends('templates.default')
@section('content')

    <div class="formCad" >
        <h2>Cadastro de Usuário</h2></br>

    <?php
        echo Form::open(array('name' => 'cadForm', 'url' => 'store', 'method' => 'POST'));

        echo Form::label('username', 'Usuário') . '<br/>';
        echo Form::text('username', '', array(
                        'class' => 'form-control',
                        'placeholder' => 'Digite um nome de usuário',


                )) . '<br/>';

        echo Form::label('name', 'Nome') . '<br/>';
        echo Form::text('name', '', array(
                        'class' => 'form-control',
                        'placeholder' => 'Digite seu nome'
                )) . '<br/>';

        echo Form::label('email', 'Email') . '<br/>';
        echo Form::email('email', '', array(
                        'class' => 'form-control',
                        'placeholder' => 'Digite seu email'
                        )) . '<br/>';

        echo Form::label('cpf', 'CPF') . '<br/>';
        echo Form::text('cpf', '', array('class' => 'form-control',
                        'placeholder' => 'Digite seu CPF',
                        'mask' => '999.999.999-99'
                )) . '<br/>';

        echo Form::label('rg', 'RG') . '<br/>';
        echo Form::text('rg', '', array('class' => 'form-control',
                        'placeholder' => 'Digite seu RG'
                        )) . '<br/>';

       // echo Form::label('birthDate', 'Data de Nascimento (dd/mm/aaaa)') . '<br/>';
       // echo Form::date('birthDate', '', array(
       //                 'class' => 'form-control',
       //                 'placeholder' => 'Digite a data de nascimento',
       //         )) . '<br/>';

        echo '<div class="form-control">';
        echo Form::checkbox('graduated', 'value', false) . ' ';
        echo Form::label('graduated', 'É formado na área?') . '<br/>' . '<br/>';
        echo '</div>' . '</br>';

        echo Form::label('yearCourse', 'Ano de Formação') . '<br/>';
        echo Form::number('yearCourse', '', array(
                        'class' => 'form-control',
                        'placeholder' => 'Diite o ano da ultima formação'
                )) . '<br/>';

        echo Form::label('accessLevel', 'Nivel de Acesso') . '<br/>';
        echo Form::number('accessLevel', '', array(
                        'class' => 'form-control',
                        'placeholder' => 'Defina o nivel de acesso'
                )) . '<br/>';

        echo Form::label('password', 'Senha') . '<br/>';
        echo Form::password('password', array(
                        'class' => 'form-control',
                        'placeholder' => 'Defina sua senha',
                )) . '<br/>';

        echo Form::label('passwordConf', 'Confirmar Senha') . '<br/>';
        echo Form::password('passwordConf', array(
                        'class' => 'form-control',
                        'placeholder' => 'Digite sua senha novamente',
                )) . '<br/>';


        echo Form::submit('Enviar', array('class' => 'btn btn-primary btn-block'));
        echo '</br>';
        echo Form::submit('Cadastrar Repositório', array('class' => 'btn btn btn-success btn-block btn-block'));
        echo Form::close();
        echo '</br>';

       // echo link_to_route('user.userrepository', $title = 'Cadastrar Repositório!', $parameters = array(), $attributes = array(
       //         'class' => 'btn btn-success btn-block',
       //         'method'=>'post'));
        echo '</br>';


      //  echo Form::submit('Cadastrar Repositório', array(
      //          'class' => 'btn btn-success btn-block'));
      //  echo '</br>';


        echo Form::close();

        ?>
    </div>
@stop