
    <?php

    echo Form::label('name', 'Nome');
    echo Form::text('name', null, array('class' => 'form-control','placeholder' => 'Digite seu nome'));

    echo Form::label('email', 'Email');
    echo Form::email('email', null, array('class' => 'form-control','placeholder' => 'Digite seu email'));

    echo Form::label('accessLevel', 'Nivel de Acesso');
    echo Form::number('accessLevel', null, array('class' => 'form-control','placeholder' => 'Nivel de acesso'));

    echo Form::label('password', 'Senha');
    echo Form::password('password', array('class' => 'form-control','placeholder' => 'Defina sua senha'));

    ?>

