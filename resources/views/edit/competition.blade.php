@extends('templates.default')
@section('content')



    <script>
        angular.module("competicao").controller("userrepositoryLoadCtrl", function ($scope) {

            var loadId = function () {
                setGlobal_id(<?php echo $competition->id; ?>);
            };
            loadId();
        });
    </script>

    <div ng-controller="userrepositoryLoadCtrl"></div>

    <div ng-controller="competitionCtrl" xmlns="http://www.w3.org/1999/html">
        <div class="row formCompetition">

            <div class="title">
                <h2>Cadastro de Competição</h2></br>
            </div>

            <div class="col-md-4">
                <br/>
                <?php
                //$inicio = DateTime::createFromFormat('Y-m-d H:i:s', $competition->dateBegin.$competition->hoursBegin);
                $inicio = DateTime::createFromFormat('Y-m-d H:i:s', '2015-10-11 10:00:00');
                $hrs =  DateTime::createFromFormat('Y-m-d H:i:s', '2015-10-11 10:00:00');
                //dd($inicio);
                $intervalo = $inicio->diff($hrs);

                if($inicio > $hrs){echo 'Falta: '.$intervalo->format('%Y-%m-%d %H:%I:%S');}
                else { echo 'Inicio '.$inicio->format('d/m/y h:i:s');}

//                echo $intervalo->format('%Y-%m-%d %H:%I:%S');//.'-'.$competition->dateBegin.$competition->hoursBegin;


                //dd($intervalo);
                //echo $intervalo;
                    echo Form::model($competition, ['route' => ['competition.update', $competition], 'method' => 'PUT']);
                    echo '<div class="row">'
                                .'<div class="inputNameCompetiton">';

                        echo Form::label('name', 'Nome da Competição') . '<br/>';
                        echo Form::text('name', null, [
                                'class' => 'form-control',
                                'ng-required' => 'true',
                                'placeholder' => 'Digite o Nome da Competição',
                                'id' => 'name'
                        ]);
                        echo '</br>'
                                .'</div>'
                                .'<div class="col-md-6">';


                        echo Form::label('dateBegin', 'Data de Início');
                        echo Form::date('dateBegin', null,[
                                'class' => 'form-control',
                                'ng-required' => 'true'
                        ]);

                        echo '<br/>';
                        echo Form::label('dateEnd', 'Data de Termino');
                        echo Form::date('dateEnd', null, [
                                'class' => 'form-control',
                                'ng-required' => 'true'
                        ]);
                        echo '</br >' . '</div>' . '<div class="col-md-6 ">';

                        echo Form::label('hoursBegin', 'Horário de Inicio');
                        echo Form::time('hoursBegin', null, [
                                'class' => 'form-control',
                                'ng-required' => 'true'
                        ]);

                        echo '<br/>';
                        echo Form::label('hoursEnd', 'Horário de Termino');
                        echo Form::time('hoursEnd', null, [
                                'class' => 'form-control',
                                'ng-required' => 'true'
                        ]);
                            echo '</br >'.'</br >'.'</br >'.'</div>'.'</div>';

                echo Form::submit('Gravar', array('class' => 'btn btn-primary btn-block'));
                echo Form::close();
                echo '<br/>';

                echo link_to_route('problem.create', $title = '+ Problemas', $parameters = array($competition->id), $attributes = array('class' => 'btn btn-success btn-block'));
                echo ' <br/>';
                echo link_to_route('competition.competitionUser', $title = '+ Usuário', $parameters = array($competition->id), $attributes = array('class' => 'btn btn-success btn-block'));
                echo ' <br/>';
                //echo link_to_route(null, $title = 'Atualizar', $parameters = array($competition->id), $attributes = array('class' => 'btn btn-success btn-block'));


                echo Form::open(['route' => ['competition.destroy',$competition->id], 'method' => 'DELETE']);
                echo Form::submit('Apagar', array('class' => 'btn btn-danger btn-block'));
                ?>


            </div>
            <div class="col-md-4 ">
                <div class="listCompetition">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead>
                        <th colspan="2">Problemas</th>
                        </thead>
                        <tbody>
                        <tr ng-repeat="i in problems">
                            <td>{{i.code}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="listCompetition">

                    <table class="table table-striped table-bordered">
                        <tr>
                            <thead>
                            <th >Participantes</th>
                            </thead>
                        </tr>

                        <tbody>
                        <tr ng-repeat="y in users">
                            <td>{{y.name}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@stop