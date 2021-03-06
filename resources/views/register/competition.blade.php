@extends('templates.default')
@section('content')

    <div ng-controller="competitionCtrl" xmlns="http://www.w3.org/1999/html">

        <div class="row">
            <div class="col-md-4">

            </div>

            <div class="col-md-4 title">
                <h2>Cadastro de Competição</h2></br>
            </div>
            <div class="col-md-4">

            </div>


        </div>

        <div class="row formCompetition">

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
                        <input id="name" name="name" type="text" class="form-control"
                               ng-required="true"
                               placeholder='Digite o Nome da Competição'/>
                        </br >
                    </div>
                    <div class="col-md-6 ">

                        <label for="dateBegin">Data de Início</label>
                        <input id="dateBegin" name="dateBegin" maxlength=10 type="date"
                               class="form-control">
                        <br/>
                        <label for="dateEnd">Data de Termino</label>
                        <input id="dateEnd" name="dateEnd" maxlength=10 type="date" class="form-control"/>
                        </br >

                    </div>
                    <div class="col-md-6 ">

                        <label for="hoursBegin">Horário de Inicio</label>
                        <input id="hoursBegin" name="hoursBegin" type="time" class="form-control"/>
                        </br >
                        <label for="hoursEnd">Horário de Termino</label>
                        <input id="hoursEnd" name="hoursEnd" type="time" class="form-control"/>
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