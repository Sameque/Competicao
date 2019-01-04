
<nav class="navbar navbar-inverse">
    <div class="container">

        <ul class="nav navbar-nav">
            <li>
                <?php
                echo link_to('/', $title = 'Home', $attributes = array(), $secure = null);
                ?>
            </li>

            <li>
                <?php
                echo link_to('auth/login', $title = 'Efetuar Login', $attributes = array('method'=>'GET'), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('user/create', $title = 'Cadstro de Usuário', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('register/competition', $title = 'Cadastro de Competições', $attributes = array(), $secure = null);
                ?>
            </li>

            <li>
                <?php
//                echo link_to('#', $title = 'Ranking', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
//                echo link_to('submission', $title = 'Submissão', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('listuser', $title = 'Usuários', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('repository/create', $title = 'Repositórios', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('competition/list', $title = 'Competições', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('auth/logout', $title = 'Sair', $attributes = array('method'=>'GET'), $secure = null);
                ?>
            </li>

        </ul>
    </div>
</nav>
<!--
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                <li><a href="../navbar-static-top/">Static top</a></li>
                <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
        </div>
    </div>
</nav>
-->