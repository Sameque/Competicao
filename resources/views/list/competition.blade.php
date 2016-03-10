@extends('templates.default')
@section('content')

    <h2 class="title">Lista de Competições</h2></br>

    <div class="listUser" ng-controller="listCompetitionCtrl">
        <table class="table table-striped">
            <tbody>
            <tr>

                <th>ID</th>
                <th>Nome</th>
                <th>Data Inicio</th>
                <th>Hora Inicio</th>
                <th>Data Fim</th>
                <th>Hora Fim</th>
                <th>Problemas</th>
                <th>Usuários</th>
                <th>Editar</th>

            </tr>
            <tr ng-repeat="i in competition">
                <td>{{i.id}}</td>
                <td>{{i.name}}</td>
                <td>{{i.dateBegin | date:'dd-MM-yyyy'}}</td>
                <td>{{i.hoursBegin}}</td>
                <td>{{i.dateEnd}}</td>
                <td>{{i.hoursEnd}}</td>
                <td>
                    <a href="/problem/create/{{i.id}}" class="btn btn-primary" method="GET">
                        <i class="glyphicon glyphicon-th-list"></i>
                    </a>
                </td>

                <td>
                    <a href="/competition/competitionUser/{{i.id}}" class="btn btn-primary" method="GET">
                        <i class="glyphicon glyphicon-th-list"></i>
                    </a>
                </td>

                <td>
                    <a href="/competition/edit/{{i.id}}" class="btn btn-success" method="GET">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                </td>


            </tr>
            </tbody>
        </table>
    </div>

@stop