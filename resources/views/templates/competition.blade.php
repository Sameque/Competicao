<?php
    echo Form::model($competition, ['route' => ['competition.update', $competition], 'method' => 'PUT']);

    echo Form::label('name', 'Nome da Competição') . '<br/>';
    echo Form::text('name',     null, ['class' => 'form-control','placeholder' => 'Nome da Competição']);

    echo Form::label('dateBegin', 'Data de Início');
    echo Form::date('dateBegin',null,['class' => 'form-control','maxlength'=>10]);

    echo Form::label('dateEnd', 'Data de Termino');
    echo Form::date('dateEnd',null,['class' => 'form-control','maxlength'=>10]);

    echo Form::label('hoursBegin', 'Horário de Inicio');
    echo Form::time('hoursBegin', null, ['class' => 'form-control']);

    echo Form::label('hoursEnd', 'Horário de Termino');
    echo Form::time('hoursEnd', null, ['class' => 'form-control']);

    echo Form::submit('Gravar', array('class' => 'btn btn-primary btn-block'));
    echo Form::close();

    ?>
