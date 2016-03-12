@extends('templates.default')
@section('content')

    <div class="formCad">
        <h2>Cadastro de Repositório</h2></br>

        <div class="formCompetition">

            @include('templates.message')

            <?php
            echo Form::open(array('name' => 'cadForm1', 'url' => 'repository/store', 'method' => 'POST'));

            echo Form::label('name', 'Nome') . '<br/>';
            echo Form::text('name', null, array(
                            'class' => 'form-control',
                            'placeholder' => 'Digite o nome do repositório',
                    )) . '<br/>';

            echo Form::label('url', 'URL') . '<br/>';
            echo Form::text('url', null, array(
                            'class' => 'form-control',
                            'placeholder' => 'Digite o endereço do repositório',
                    )) . '<br/>';
            echo Form::submit('Enviar', array('class' => 'btn btn-primary btn-block'));

            echo Form::close();
            ?>
        </div>
    </div>


@stop