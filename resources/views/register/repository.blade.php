@extends('templates.default')
@section('content')

    <div class="formCad" >
        <h2>Cadastro de Repositório</h2></br>

        <div class="formCompetition">

            <?php
            echo Form::open(array('name' => 'cadForm1', 'url' => 'repository/store', 'method' => 'POST'));

            echo Form::label('name', 'Nome') . '<br/>';
            echo Form::text('name', '', array(
                            'ng-required' => 'true',
                            'class' => 'form-control',
                            'placeholder' => 'Digite o nome do repositório',
                            'ng-model' => 'repository.name',
                    )) . '<br/>';

            echo Form::label('url', 'URL') . '<br/>';
            echo Form::url('url', '', array(
                            'ng-required' => 'true',
                            'class' => 'form-control',
                            'placeholder' => 'Digite o endereço do repositório',
                            'ng-model' => 'repository.yrl'
                    )) . '<br/>';
            echo Form::submit('Enviar', array('class' => 'btn btn-primary btn-block'));

            echo Form::close();
            ?>
        </div>
    </div>


@stop