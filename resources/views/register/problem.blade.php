@extends('templates.default')
@section('content')
    <div>
        <h2 class="title">Cadastro de Problemas</h2></br>
        
         @include('templates.message')
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
                    
                    @foreach ($problems as $problem)

                        <tr>
                            <td>{!!$problem->code!!}</td>
                            <td>
                                <a href="/problem/destroy/{!!$problem->id!!}" class="btn btn-danger"
                                   method="DELETE">Apagar</a>
                            </td>
                        </tr>
                    @endforeach

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
                        echo Form::model('', array('name' => 'cadForm1', 'url' => 'problem/store', 'method' => 'POST'));




                        ?>
                        <br/>
                        <label for="repository_id">Repositório</label>
                        <select name="repository_id" id="repository_id" class="form-control">
                            <option value=""> Selecione um Repositório</option>
                        @foreach ($repositorys as $repository)
                            <option value={!! $repository->id !!}>
                                {!!$repository->name!!}
                            </option>
                        @endforeach    
                            
                        </select>
                        </br >
                        <label for="code">Código</label>
                        <input name="code" id="code" type="text" class="form-control"
                               value=""
                               placeholder='Digite o código do problema'/><br/>
                   
                        <label for="dificult">Dificuldade</label>
                        <input name="dificult" id="dificult" type="number" class="form-control"
                               placeholder='Dificuldade do problema'/>

                        <input value="{!! $competition_id !!}" name="competition_id" id="competition_id" type="hidden"
                               class="form-control"/></br >

                        <?php
                        echo Form::submit('Adicionar', array('class' => 'btn btn-primary btn-block'));
                        echo Form::close();
                        echo '<br/>';
                        
                        
                        echo link_to_route('competition.edit',
                                                $title = ' Voltar para competição',
                                                    $parameters = array($competition_id),
                                                $attributes = array('class' => 'btn glyphicon glyphicon-fast-backward  btn-warning  btn-block')
                                );
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </br>
    </div>

@stop