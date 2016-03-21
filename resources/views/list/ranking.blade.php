@extends('templates.default')
@section('content')

    <h2>Ranking</h2></br>
    <div class="listRanking">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>Nome</th>
                @foreach ($problems as $problem)
                    <th>{!! $problem->code !!}</th>
                @endforeach
            </tr>
            @foreach ($rankings as $ranking)
                <tr>
                    <td>{!! $ranking['name'] !!}</td>
                    @foreach ($ranking['problems'] as $problem)
                        <td>

                            @if ($problem['resp'])
                                B - {!! $problem['qt'].'/'.$problem['time'] !!}
                                @else
                                 {!! $problem['qt'].'/-' !!}
                            @endif
                        </td>
                    @endforeach

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop