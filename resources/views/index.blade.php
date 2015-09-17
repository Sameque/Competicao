@extends('templates.default')
@section('content')
    <h1>Home</h1>
    <div class="navBarLeft">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active">
                <?php

                echo link_to('#', $title = 'Cadastrar Competição', $attributes = array(), $secure = null);
                ?>
            </li>
            <li role="presentation">
                <?php
                echo link_to('user/create', $title = 'Cadastrar Usuário', $attributes = array(), $secure = null);
                ?>
            </li>
            <li role="presentation">
                <?php
                echo link_to('#', $title = 'Ranking', $attributes = array(), $secure = null);
                ?>
            </li>
            <li role="presentation">
                <?php
                echo link_to('listuser', $title = 'Usuários', $attributes = array(), $secure = null);
                ?>
            </li>
            <li>
                <?php
                echo link_to('competition/index', $title = 'Competições', $attributes = array(), $secure = null);
                ?>
            </li>

        </ul>
    </div>

@stop