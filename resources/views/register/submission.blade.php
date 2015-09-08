@extends('templates.default')
@section('content')
    <script>
        angular.module("competicao").controller("loadIdCtrl", function ($scope) {
            var loadId = function () {
                setGlobal_id(<?php //echo $competition_id; ?>);
//            alert(global_id);
            };
            loadId();
        });
    </script>
    <div ng-controller="loadIdCtrl"></div>

    <div ng-controller="competitionUserCtrl">

        <h2 class="title">Submissão</h2></br>
        <div class="row">
            <div class="col-md-5 ">
                <div class="listProblem">
                    <table class="table table-striped table-bordered ">
                        <thead>
                        <tr>
                            <th colspan="3">Problemas</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="i in problems">
                            <td>{{i.name}}</td>
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
                        echo Form::model('', array('name' => 'cadForm1', 'url' => 'submission/submit', 'method' => 'POST'));
                        ?>

                        <br/>
                        <label for="code">Código do Programa</label><br/>
                        <textarea type="textarea"  rows="10" cols="50" class="form-control">Digite seu código </textarea> <br/>
                        <label for="repository_id">Problema</label>
                        <select name="user_id" id="user_id" class="form-control"
                                ng-model="competition.users">
                            <option value=""> Selecione o Problema</option>
                            <option ng-required="true" ng-repeat="i in allUsers" value={{i.id}}>
                                {{i.name}}
                            </option>
                        </select>
                        </br >
                        <input value="id" name="competition_id" id="competition_id" type="hidden"
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