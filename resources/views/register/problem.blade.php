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

    <div ng-controller="problemCtrl" xmlns="http://www.w3.org/1999/html">
        <h2 class="title">Cadastro de Problemas</h2></br>
        <div class="row">
            <div class="col-md-5 ">
                <div class="listProblem">
                    <table class="table table-striped table-bordered ">
                        <tr>
                            <thead>
                            <th colspan="3">Problemas</th>
                            </thead>
                        </tr>

                        <tbody>
                        <tr ng-repeat="i in problems">
                            <td>{{i.code}}</td>
                            <td>
                                <a href="/problem/destroy/{{i.id}}" class="btn btn-danger"
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
                        @include('templates.message')
                        </br>

                        <br/>
                        <?php
                        echo Form::model('', array('name' => 'cadForm1', 'url' => 'problem/store', 'method' => 'POST'));
                        ?>
                        <br/>
                        <label for="repository_id">Repositório</label>
                        <select name="repository_id" id="repository_id" class="form-control"
                                ng-model="problem.repository">
                            <option value=""> Selecione um Repositório</option>
                            <option ng-required="true" ng-repeat="repository in repositorys" value={{repository.id}}>
                                {{repository.name}}
                            </option>
                        </select>
                        </br >
                        <label for="code">Código</label>
                        <input name="code" id="code" type="text" class="form-control" ng-model="problem.code"

                               placeholder='Digite o código do problema'/><br/>
                    <!--
                        <label for="name">Nome</label>
                        <input name="name" id="name" type="text" class="form-control" ng-model="problem.name"

                               placeholder='Digite o nome de apresentação'/><br/>
                    -->
                        <label for="dificult">Dificuldade</label>
                        <input name="dificult" id="dificult" type="number" class="form-control"
                               ng-model="problem.dificult"

                               placeholder='Dificuldade do problema'/>

                        <input value="<% $competition_id %>" name="competition_id" id="competition_id" type="hidden"
                               class="form-control"/></br >

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