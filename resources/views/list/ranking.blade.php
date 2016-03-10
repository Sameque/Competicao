@extends('templates.default')
@section('content')

    <h2>Lista de Usuários</h2></br>
    <div class="listUser">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>Nome</th>
            </tr>
            @foreach ($ranking as $user)
                <tr>
                    <td>{!! $user->name !!}</td>

                    @foreach($user as $problem)
                        <td>{!! $problem->pt !!}
                        {!! $problem->time !!}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop