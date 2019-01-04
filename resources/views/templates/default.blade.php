<!doctype html>
<html lang="en" ng-app="competicao">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    echo Html::style('bootstrap/css/bootstrap.css');
    echo Html::style('css/default.css');
    echo '';//Html::script('node_modules\angular\angular.min.js');
    echo '';//Html::script('node_modules\angular\ngMask.min.js');
    echo '';//Html::script('node_modules\angular\angular-route.min.js');

    echo '';//Html::script('js/app.js');
    //echo Html::script('js/jquery/jquery-1.12.3.min.js');
    //echo Html::script('js/jquery/dist/jquery.maskedinput.js');
    //echo Html::script('js/mask.js');

    ?>
    <meta charset="UTF-8">
    <title>Competição</title>

</head>
<body class="jumbotron">

<header>
    <div>
        <?php
        if (Auth::check()) {
            echo 'Usuário: ' . Auth::user()->name;
        }else echo 'Efetue login!!!'
        ?>
    </div>
    <br/>

    @include('templates.menuDefault')
</header>

@include('templates.message')

@yield('content')

<footer>

</footer>

</body>

</html>