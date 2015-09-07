@extends('templates.default')
@section('content')

    <div ng-controller="competitionCtrl" xmlns="http://www.w3.org/1999/html">

        <div class="row formCompetition">

            <div class="title">
                <h2>Cadastro de Competicao</h2></br>
            </div>

            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <br/>
                <?php
                echo Form::model('competition', array('name' => 'cadForm', 'url' => 'competition/store', 'method' => 'POST'));
                ?>
                <br/>

                <div class="row">
                    <div class="inputNameCompetiton">
                        <label for="name">Nome da Competição</label>
                        <input name="name" id="name" type="text" class="form-control"
                               ng-model="competition.name"
                               ng-required="true"
                               placeholder='Digite o Nome da Competição'/>
                        </br >
                    </div>
                    <div class="col-md-6 ">

                        <label for="dateBegin">Data Início</label>
                        <input name="dateBegin" id="dateBegin" type="date" value="<% old('dateBegin') %>"
                               class="form-control" ng-model="competition.dateBegin">
                        <br/>
                        <label for="dateEnd">Data de Termino</label>
                        <input name="dateEnd" id="dateEnd" type="date" class="form-control"
                               ng-model="competition.dateEnd"/>
                        </br >

                    </div>
                    <div class="col-md-6 ">

                        <label for="hoursBegin">Horário de Inicio</label>
                        <input name="hoursBegin" id="hoursBegin" type="time" class="form-control"
                               ng-model="competition.hoursBegin"/>
                        </br >
                        <label for="hoursEnd">Hóra de Termino</label>
                        <input name="hoursEnd" id="hoursEnd" type="time" class="form-control"
                               ng-model="competition.hoursEnd"/>
                        </br >
                    </div>
                </div>
                <?php
                echo Form::submit('Gravar', array('class' => 'btn btn-primary btn-block'));
                echo Form::close();
                echo '<br/>';
                ?>
            </div>
            <div class="col-md-4">
            </div>
        </div>
@stop