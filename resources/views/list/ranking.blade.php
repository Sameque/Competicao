@extends('templates.default')
@section('content')

    <h2>Ranking</h2></br>
    <div class="listRanking">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>Nome</th>
                @if($problems)
                    @foreach ($problems as $problem)
                        <th>{!! $problem->code !!}</th>
                    @endforeach
                @endif
                <th>Total</th>

            </tr>
            @if($rankings)        
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
                        <td>
                            {!! $ranking['acceptTotal'] !!}
                            /
                            {!! $ranking['timeTotal'] !!}

                        </td>

                    </tr>
                @endforeach
           @endif

            </tbody>
        </table>
    </div>
@stop