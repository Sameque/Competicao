@extends('templates.default')
@section('content')
    
    <div>

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
                      @foreach ($users as $user)
                        <tr>
                            <td>{!!$user->name!!}</td>
                            <td>
                                <a href="/competition/user/destroy/{!!$competition->id!!}/{!!$user->id!!}" class="btn btn-danger"
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
                        echo Form::model('', array('name' => 'cadForm1', 'url' => 'competition/user/store', 'method' => 'POST'));
                        ?>
                        <br/>
                        <label for="repository_id">Usuário</label>
                        
                        
                        
                        <select name="user_id" id="user_id" class="form-control">
                            <option value=""> Selecione o Usuário</option>
                            
                          @foreach ($allUsers as $user)  
                          <option value={!!$user->id!!}>
                                {!!$user->name!!}
                            </option>
                          @endforeach
                        
                        
                        </select>
                        
                        
                        
                        </br >
                        <input value="<% $competition->id %>" name="competition_id" id="competition_id" type="hidden"
                               class="form-control"/></br >

                        <?php
                        echo Form::submit('Adicionar', array('class' => 'btn btn-primary btn-block'));
                        echo Form::close();
                        echo '<br/>';

                        echo link_to_route('competition.edit',
                                $title = ' Voltar para competição',
                                $parameters = array($competition->id),
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