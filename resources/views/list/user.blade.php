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
                <th>Repositório</th>
                <th>Editar</th>
                <th>Excluir</th>

            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{!! $user->id !!}</td>
                    <td>{!! $user->name !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->accessLevel !!}</td>
                    <td>
                        <?php
                            echo link_to_route('edit.userrepository',   $title = 'Repositório!', $parameters = array($user->id), $attributes = array('class' => 'btn btn-success btn-block'));
                        ?>
                    </td>
                    <td>
                        <?php
                            echo link_to_route('edit.user',             $title = 'Editar',      $parameters = array($user->id), $attributes = array('class' => 'btn  btn-primary btn-block' ,'method'=>'delete'));
                        ?>
                    </td>

                    <td class="">
                        <?php
                            echo Form::open(array('route' => ['delete.user', $user->id], 'method' => 'DELETE'));
                            echo Form::submit('Excluir!', array('class' => 'btn btn-danger'));
                            echo Form::close();
                        ?>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop