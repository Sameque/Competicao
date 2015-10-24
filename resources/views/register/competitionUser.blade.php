@extends('templates.default')
@section('content')
    <script>
        angular.module("competicao").controller("loadIdCtrl", function ($scope) {
            var loadId = function () {
                setGlobal_id(<?php echo $competition_id; ?>);
//            alert(global_id);
            };
            loadId();
        });
    </script>
    <div ng-controller="loadIdCtrl"></div>

    <div ng-controller="competitionUserCtrl">

        <h2 class="title">Cadastrar Usuário/Competição</h2></br>
        <div class="row">
            <div class="col-md-5 ">
                <div class="listProblem">
                    <table class="table table-striped table-bordered ">
                        <thead>
                        <tr>
                            <th colspan="3">Usuários</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="i in users">
                            <td>{{i.name}}</td>
                            <td>
                                <a href="/competition/user/destroy/{{competition_id}}/{{i.id}}" class="btn btn-danger"
                                   method="DELETE">Apagar</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class=" col-md-7">
                <div class="formCad">
                    <div class="formProblem">
                        </br>
                        <br/>
                        <?php
                        echo Form::model('', array('name' => 'cadForm1', 'url' => 'competition/user/store', 'method' => 'POST'));
                        ?>
                        <br/>
                        <label for="repository_id">Usuário</label>
                        <select name="user_id" id="user_id" class="form-control"
                                ng-model="competition.users">
                            <option value=""> Selecione o Usuário</option>
                            <option ng-required="true" ng-repeat="i in allUsers" value={{i.id}}>
                                {{i.name}}
                            </option>
                        </select>
                        </br >
                        <input value="<% $competition_id %>" name="competition_id" id="competition_id" type="hidden"
                               class="form-control"/></br >

                        <?php
                        echo Form::submit('Adicionar', array('class' => 'btn btn-primary btn-block'));
                        echo Form::close();
                        echo '<br/>';

                        echo link_to_route('competition.edit',
                                $title = ' Voltar para competição',
                                $parameters = array($competition_id),
                                $attributes = array('class' => 'btn glyphicon glyphicon-fast-backward  btn-warning  btn-block'));
                        ?>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
        </br>
    </div>

@stop