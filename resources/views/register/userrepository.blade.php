@extends('templates.default')
@section('content')
        <div class="row">
            <div class="col-md-4">
                <div class="listCompetition">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>Repositóri</th>
                        <th>Usuário</th>
                        <th>Apagar</th>
                        </thead>
                        <tbody>
                        @foreach ($userRepositorys as $userRepository)
                            <tr>
                                <td>{!!  $userRepository->repository->name !!}</td>
                                <td>{!! $userRepository->username !!}</td>
                                <td>
                                    <a href="/listuserrepository/delete/{!! $userRepository->id !!}" class="btn btn-danger" method="DELETE">Apagar</a>
                                </td>
                            </tr>
                        @endforeach
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
                        <!--
                        <label for="username">Repositário</label>

                        <select name="repository_id" id="repository_id" class="form-control">
                            <option value=""> Selecione um Repositório</option>
                            <option ng-required="true" ng-repeat="repository in repositorys" value={{repository.id}}>
                                {{repository.name}}
                            </option>

                        </select>
-->
                        </br >
                        <?php
                        echo Form::label('repository_id', 'Repositário') . '<br/>';
                        echo Form::select('repository_id', $repositorys,null,[
                                'placeholder' => 'Selecione um Repositório',
                                'class' => 'form-control']);
                        echo '<br/>';

                        echo '<br/>';
                        echo Form::label('username', 'Usuário') . '<br/>';
                        echo Form::text('username', null, array(
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite o nome do repositório',
                                )) . '<br/>';
                        ?>

                        <input value={!! $user_id !!} name="user_id" id="user_id" type="hidden" class="form-control"
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

@stop