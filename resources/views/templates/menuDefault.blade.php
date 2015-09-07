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
                echo link_to('logout', $title = 'Efetuar Login', $attributes = array('method'=>'GET'), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('register/competition', $title = 'Cadastro de Competições', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('user/create', $title = 'Cadstro de Usuário', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('#', $title = 'Ranking', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('#', $title = 'Submissão', $attributes = array(), $secure = null);
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
        </ul>
    </div>
</nav>