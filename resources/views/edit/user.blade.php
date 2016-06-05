@extends('templates.default')
@section('content')
    <script>
        angular.module("competicao", ['ngMask', 'ngRoute'])
        angular.module('competicao', []).controller('updateCtrl', function ($scope, $http, $location) {
            var id = <?php echo $user->id ?>;

            $scope.user_id = id;
            $scope.teste = 0;
            $scope.url = '';

            $scope.user = [];
            var loadUsers = function () {
                url = 'http://localhost:8000/show/' + id.toString();
                $http.get(url).success(function (data) {
                    $scope.user = data;
                    $scope.user.graduated = isGraduated($scope.user.graduated);
                    $scope.user.passwordConf = $scope.user.password;
                });
                var isGraduated = function (graduated) {
                    if ($scope.user.graduated == 0) {
                        $scope.user.yearCourse = 0;
                        return false
                    } else return true;
                }
            };
            var loadMsg = function(){
               // alert(id);
            };
            loadUsers();
            loadMsg();

        });

    </script>

    <h2 class="title">Atualizar Cadastro</h2></br>

    <div class="formCad" ng-controller="updateCtrl">

        <div>

            <div ng-view></div>
            <?php

            echo '</br>';
            echo Form::model($user,['route' => ['update.user', $user->id], 'method' => 'PUT']);

            echo Form::label('username', 'Usuário') . '<br/>';
            echo Form::text('username', null, array(
                            'ng-required' => 'true',
                            'class' => 'form-control',
                            'placeholder' => 'Digite um nome de usuário',
                            'ng-show' => 'true',
                            /*'ng-model' => 'user.username',*/

                    ));


            echo Form::label('name', 'Nome') . '<br/>';
            echo Form::text('name', null, array(
                            'ng-required' => 'true',
                            'class' => 'form-control',
                            'placeholder' => 'Digite seu nome',
                            /*'ng-model' => 'user.name'*/
                    ));

            echo Form::label('email', 'Email') . '<br/>';
            echo Form::email('email', null, array('ng-required' => 'true',
                            'class' => 'form-control',
                            'placeholder' => 'Digite seu email',
                            /*'ng-model' => 'user.email'*/
                    ));

            echo Form::label('cpf', 'CPF') . '<br/>';
            echo Form::text('cpf', null, array(
                            'class' => 'form-control',
                            'placeholder' => 'Digite seu CPF',
                           /* 'ng-model' => 'user.cpf',*/
                            'mask' => '999.999.999-99',
                    ));

            echo Form::label('rg', 'RG') . '<br/>';
            echo Form::text('rg', null, array('class' => 'form-control',
                            'placeholder' => 'Digite seu RG',
                            /*'ng-model' => 'user.rg'*/
                    )) . '<br/>';

            //  echo Form::label('birthDate', 'Data de Nascimento (dd/mm/aaaa)') . '<br/>';
            //   echo Form::date('birthDate', null, array(
            //'ng-required' => 'true',
            //                   'class' => 'form-control',
            //                   'placeholder' => 'Digite a data de nascimento',
            //                   'ng-model' => 'user.birthDate',
            //'mask'=>'99/99/9999'
            //           )) . '<br/>';

            echo '<div class="form-control">';
            echo Form::checkbox('graduated', 'value', false, array(
                                    /*'ng-model' => 'user.graduated',*/
            ));
            echo Form::label('graduated', 'É formado na área?') . '<br/>' . '<br/>';
            echo '</div>';

            echo Form::label('yearCourse', 'Ano de Formação') . '<br/>';
            echo Form::number('yearCourse', '', array(
                            'class' => 'form-control',
                            'placeholder' => 'Diite o ano da ultima formação',
                            /*'ng-model' => 'user.yearCourse',*/
                            'ng-disabled' => '!user.graduated',
                    ));

            //echo '<div ng-show="admin()">';
            echo Form::label('accessLevel', 'Nivel de Acesso') . '<br/>';
            echo Form::number('accessLevel', '', array(
                            'class' => 'form-control',
                            'placeholder' => 'Defina o nivel de acesso',
                            'ng-model' => 'user.accessLevel'
                    ));
            //echo '</div>';

            echo Form::label('password', 'Senha');
            echo Form::password('password', array('ng-required' => 'true',
                            'class' => 'form-control',
                            'placeholder' => 'Defina sua senha',
                            'ng-model' => 'user.password'
                    )) . '<br/>';

//            echo Form::label('passwordConf', 'Confirmar Senha') . '<br/>';
//            echo Form::password('passwordConf', array(
//                            'class' => 'form-control', '
//                        placeholder' => 'Digite sua senha novamente',
//                            'ng-model' => 'user.passwordConf'
//                    )) . '<br/>';


            echo Form::submit('Enviar', array('class' => 'btn btn-primary btn-block', 'ng-disabled' => 'false'));
            echo '';

            echo Form::close();

            echo '</br>';
            echo link_to_route('userrepository.user', $title = 'Cadastrar Repositório!', $parameters = array($user->id), $attributes = array('class' => 'btn btn-success btn-block'));
            echo '</br>';

            echo Form::open(array('route' => ['delete.user', $user->id], 'method' => 'DELETE'));
            echo Form::submit('Excluir!', array('class' => 'btn  btn-block btn-danger', ' ng-show' => 'true'));
            echo Form::close();

            ?>

        </div>
    </div>
@stop