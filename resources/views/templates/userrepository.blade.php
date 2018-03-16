<?php
    echo Form::model($userrepository,['route' => ['store.userrepository', $user_id], 'method' => 'POST']);

    echo Form::label('repository_id', 'Repositário');
    echo Form::select('repository_id', $repositorys,null,['placeholder' => 'Repositório','class' => 'form-control']);
    echo '<br />';

    echo Form::label('username', 'Usuário');
    echo Form::text('username', null, array('placeholder' => 'Nome do repositório','class' => 'form-control'));
    echo '<br/>';

    echo Form::submit('Adicionar', array('class' => 'btn btn-primary btn-block'));
    echo Form::close();
    ?>
