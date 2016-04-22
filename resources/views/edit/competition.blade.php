@extends('templates.default')
@section('content')
    <div>
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
                else {
                    echo 'Inicio '.$inicio->format('d/m/y h:i:s');
                }

//                echo $intervalo->format('%Y-%m-%d %H:%I:%S');//.'-'.$competition->dateBegin.$competition->hoursBegin;


                //   dd(\Carbon\Carbon::createFromFormat('d/m/Y', '31/12/2015','America/Sao_Paulo'));
                //dd($intervalo);
                //echo $intervalo;

                $dateBegin = DateTime::createFromFormat('Y-m-d', $competition->dateBegin);
                   // dd($competition->dateBegin);
//                    $competition->hoursBegin->format('H:I');
                    echo Form::model($competition, ['route' => ['competition.update', $competition], 'method' => 'PUT']);
                    echo '<div class="row">'
                                .'<div class="inputNameCompetiton">';

                        echo Form::label('name', 'Nome da Competição') . '<br/>';
                        echo Form::text('name', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Digite o Nome da Competição',
                                'id' => 'name'
                        ]);
                        echo '</br>'
                                .'</div>'
                                .'<div class="col-md-6">';


                        echo Form::label('dateBegin', 'Data de Início');
                        echo Form::date('dateBegin',
                                $competition->dateBegin->format('d/m/Y'),
                                [
                                'class' => 'form-control',
                                'maxlength'=>10
                        ]);

                        echo '<br/>';
                        echo Form::label('dateEnd', 'Data de Termino');
                        echo Form::date('dateEnd',
                                $competition->dateEnd->format('d/m/Y'),
                                [
                                'class' => 'form-control',
                                'maxlength'=>10
                        ]);
                        echo '</br >' . '</div>' . '<div class="col-md-6 ">';

                        echo Form::label('hoursBegin', 'Horário de Inicio');
                        echo Form::time('hoursBegin', null, [
                                'class' => 'form-control',
                        ]);

                        echo '<br/>';
                        echo Form::label('hoursEnd', 'Horário de Termino');
                        echo Form::time('hoursEnd', null, [
                                'class' => 'form-control',
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
                            @foreach ($problems as $problem)
                                <tr>
                                    <td>{!!$problem->code!!}</td>
                                </tr>
                            @endforeach
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
                            @foreach ($users as $user)
                                <tr>
                                    <td>{!!$user->name!!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop