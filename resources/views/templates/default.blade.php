<!doctype html>
<html lang="en" ng-app="competicao">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    echo Html::style('bootstrap/css/bootstrap.css');
    echo Html::style('css/default.css');
    echo Html::script('node_modules\angular\angular.min.js');
    echo Html::script('node_modules\angular\ngMask.min.js');
    echo Html::script('node_modules\angular\angular-route.min.js');

    echo Html::script('js\app.js');
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
        }
        ?>
    </div>
    <br/>
    @include('templates.menuDefault')
</header>

@yield('content')

<footer>

</footer>

</body>

</html>