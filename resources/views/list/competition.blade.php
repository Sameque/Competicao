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
                <th>Ranking</th>
                <th>Editar</th>

            </tr>
        @foreach ($competitions as $competition)

            <tr>
                <td>{!! $competition->id  !!}</td>
                <td>{!! $competition->name  !!}</td>
                <td>{!! $competition->dateBegin  !!}</td>
                <td>{!! $competition->hoursBegin  !!}</td>
                <td>{!! $competition->dateEnd  !!}</td>
                <td>{!! $competition->hoursEnd  !!}</td>
                <td>
                    <a href="/problem/create/{!! $competition->id !!}" class="btn btn-primary" method="GET">
                        <i class="glyphicon glyphicon-th-list"></i>
                    </a>
                </td>

                <td>
                    <a href="/competition/competitionUser/{!! $competition->id !!}" class="btn btn-primary" method="GET">
                        <i class="glyphicon glyphicon-user"></i>
                    </a>
                </td>
                <td>
                    <a href="/ranking/{!! $competition->id !!}" class="btn btn-success" method="GET">
                        <i class="glyphicon glyphicon-list-alt"></i>
                    </a>
                </td>

                <td>
                    <a href="/competition/edit/{!! $competition->id !!}" class="btn btn-success" method="GET">
                        <i class="glyphicon glyphicon-cog"></i>
                    </a>
                </td>

            </tr>
        @endforeach
            </tbody>
        </table>
    </div>

@stop