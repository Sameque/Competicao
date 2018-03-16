@extends('templates.default')
@section('content')

    <h2>Lista de Usuários</h2></br>
    <div class="listUser" ng-controller="listCtrl">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nivel de Acesso</th>
                <th>Editar</th>

            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{!! $user->id !!}</td>
                    <td>{!! $user->name !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->accessLevel !!}</td>
                    <td>
                        <?php
                            echo link_to_route('edit.user', $title = 'Editar', $parameters = array($user->id), $attributes = array('class' => 'btn  btn-primary '));
                        ?>
                    </td>

                        <?php
//                        echo '<td>';
//                        echo Form::open(array('route' => ['delete.user', $user->id], 'method' => 'DELETE'));
//                        echo Form::submit('Excluir!', array('class' => 'btn btn-danger'));
//                        echo Form::close();
//                        echo '</td>';
//                        ?>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop