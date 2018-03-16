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

                        @include('templates.userrepository')

                    </div>
                </div>
            </div>
        </div>
        </br>

@stop