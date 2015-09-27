@extends('templates.default')
@section('content')

    <script>

        angular.module("competicao").controller("userrepositoryLoadCtrl", function ($scope) {
            var loadId = function () {
                setGlobal_id(<?php echo $id; ?>);
            };
            loadId();
        });

        //angular.module("competicao").controller("userrepositoryCtrl", function ($scope, $http) {
        //
        //    var loadRepositorys = function () {
        //        $http.get('http://localhost:8000/repository/index/').success(function (data) {
        //            $scope.repositorys = data;
        //        });
        //    };
        //
        //    $scope.teste = function(){
        //        setTeste("Morreu!!!");
        //        teste1();
        //    };
        //
        //    $scope.user_id = <?php echo $id; ?>;
        //
        //    var loadUserRepositorys = function () {
        //        var url = 'http://localhost:8000/userrepository/show/' + $scope.user_id;
        //        $http.get(url).success(function (data) {
        //            $scope.userRepositorys = data;
        //        })
        //    };
        //    loadRepositorys();
        //    loadUserRepositorys();
        //
        //});


    </script>

    <div ng-controller="userrepositoryLoadCtrl"></div>

    <div ng-controller="userrepositoryCtrl" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-4">
                <div class="listCompetition">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>Repositóri</th>
                        <th>Usuário</th>
                        <th>ID</th>
                        </thead>
                        <tbody>
                        <tr ng-repeat="i in userRepositorys">
                            <td>{{i.repository.name}}</td>
                            <td>{{i.username}}</td>
                            <td>
                                <a href="/listuserrepository/delete/{{i.id}}" class="btn btn-danger" method="DELETE">Apagar</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class=" col-md-8">

                <div class="formCad">
                    <h2>Cadastro de Repositório</h2></br>

                    <div class="formCompetition">

                        @include('templates.message')

                        </br>

                        <br/>
                        <?php
                        echo Form::open(array('name' => 'cadForm1',
                                'url' => 'userrepository/store',
                                'method' => 'POST'));
                        ?>
                        <br/>
                        <label for="username">Repositário</label>

                        <select name="repository_id" id="repository_id" class="form-control">
                            <option value=""> Selecione um Repositório</option>
                            <option ng-required="true" ng-repeat="repository in repositorys" value={{repository.id}}>
                                {{repository.name}}
                            </option>
                        </select>

                        </br >
                        <?php
                        echo Form::label('username', 'Usuário') . '<br/>';
                        echo Form::text('username', null, array(
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite o nome do repositório',
                                )) . '<br/>';
                        ?>
                        <input value={{user_id}} name="user_id" id="user_id" type="hidden" class="form-control"
                               ng-model="user.id"/>

                        </br >

                        <?php
                        echo Form::submit('Adicionar', array('class' => 'btn btn-primary btn-block'));
                        echo Form::close();
                        echo '<br/>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </br>
    </div>
@stop