<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//use \App;
use App\User;
use App\UserRepository;
use App\ProblemSolvedUser;
use App\Libraries\CrawlerRepository\ValidateProblemSpoj;
use Illuminate\Support\Facades\Artisan;
use App\Libraries\CrawlerRepository\RepositoryUser;
use App\Libraries\CrawlerRepository\RepositoryProblem;

//App\Libraries\DateTimeCompetition
Route::get('/', ['as' => 'competicao.index', 'uses' =>  'CompeticaoController@index']);
//Route::get('/home', ['as' => 'competicao.index', 'uses' =>  'CompeticaoController@index']);

//Users
Route::get('user/create', ['as' => 'create.user', 'uses' => 'UserController@create']);
Route::post('store', 'UserController@store');
Route::put('update/{id}', ['as' => 'update.user', 'uses' => 'UserController@update']);
Route::get('edit/{id}', ['as' => 'edit.user', 'uses' => 'UserController@edit']);
Route::delete('delete/{id}', ['as' => 'delete.user', 'uses' => 'UserController@destroy']);
Route::get('listuser', ['as' => 'list.users', 'uses' => 'UserController@index']);
Route::get('users', ['as' => 'users', 'uses' => 'UserController@users']);
Route::get('show/{id}', ['as' => 'show.user', 'uses' => 'UserController@show']);
Route::get('user/userrepository/{id}', ['as' => 'user.userrepository', 'uses' => 'UserController@userrepository']);


//Repositorys -> repository
Route::get('repository/create', ['as' => 'create.repository', 'uses' => 'RepositoryController@create']);
Route::get('repository/show/{id}', ['as' => 'show.repository', 'uses' => 'RepositoryController@show']);
Route::post('repository/store', 'RepositoryController@store');
Route::get('repository/index', 'RepositoryController@index');

//UserRepository
Route::get('userrepository/{user_id}', ['as' => 'userrepository.user', 'uses' => 'UserRepositoryController@edit']);
Route::post('userrepository/store', ['as' => 'store.userrepository', 'uses' => 'UserRepositoryController@store']);
Route::get('userrepository/show/{user_id}', ['as' => 'user.userrepositoryshow', 'uses' => 'UserRepositoryController@show']);
Route::get('listuserrepository', ['as' => 'list.userrepositorys', 'uses' => 'UserRepositoryController@show']);

Route::get('listuserrepository/delete/{userRep_id}',
            ['as' => 'delete.userrepositorys',
                'uses' => 'UserRepositoryController@destroy'
            ]);
    //Route::get('listuserrepository/delete/{id}', ['as' => 'delete.userrepositorys', 'uses' => function(){
//    echo 'Teste';
//}]);

//COMPETICAO
Route::get('competition/show/{id}', ['as' => 'competition.show', 'uses' => 'CompetitionController@show']);
Route::get('competition/index', ['as' => 'competition.index', 'uses' => 'CompetitionController@listCompetition']);
Route::get('competition/list', ['as' => 'competition.list', 'uses' => 'CompetitionController@index']);
Route::get('register/competition', ['as' => 'competition.register', 'uses' => 'CompetitionController@create']);
Route::post('competition/store', ['as' => 'competition.store', 'uses' => 'CompetitionController@store']);
Route::post('competition/user/store',
    ['as' => 'competition.user.store',
        'uses' => 'CompetitionController@competitionUserStore'
    ]
);

Route::get('competition/edit/{id}', ['as' => 'competition.edit', 'uses' => 'CompetitionController@edit']);
Route::put('competition/update/{id}', ['as' => 'competition.update', 'uses' => 'CompetitionController@update']);
Route::delete('competition/destroy/{id}', ['as' => 'competition.destroy', 'uses' => 'CompetitionController@destroy']);
Route::get('competition/user/destroy/{competition_id}/{user_id}',
    ['as' => 'competition.user.destroy',
        'uses' => 'CompetitionController@userDestroy'
    ]
);
Route::get('competition/users/{competition_id}', ['as' => 'competition.user', 'uses' => 'CompetitionController@competitionUsers']);

Route::get('competition/competitionUser/{competition_id}',
    ['as' => 'competition.competitionUser',
        'uses' => 'CompetitionController@competitionUser'
    ]
);

//PROBLEM
Route::get('problem/create/{competition_id}', ['as' => 'problem.create', 'uses' => 'ProblemController@create']);
Route::get('problem/show/{id}', ['as' => 'problem.show', 'uses' => 'ProblemController@show']);
Route::get('problem/destroy/{id}', ['as' => 'problem.show', 'uses' => 'ProblemController@destroy']);
Route::post('problem/store', ['as' => 'problem.store', 'uses' => 'ProblemController@store']);
Route::get(
    'problem/showProblemCompetition/{problem_id}',
    ['as' => 'problem.showProblemCompetition',
        'uses' => 'ProblemController@showProblemCompetition'
    ]
);

//SUBMISSION
Route::get('crawler', ['as' => 'submission', 'uses' => 'SubmissionController@crawler']);
Route::get('submission', ['as' => 'submission', 'uses' => 'SubmissionController@index']);



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//LOGIN
//Route::get('logout', 'CompeticaoController@logout');









Route::post('oauth/acess_token',function(){
    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['before' => 'oauth'], function () {

    Route::get('teste/{user_id}', ['as' => 'user.teste', 'uses' => function ($user_id) {
        return App\User::find($user_id);
    }]);
    //Route::resource('post', 'ApiController', ['except' => ['create', 'edit']]);
});

//Route::get('teste', function () {
//    return 'Hello World';
//});


//TESTES
//Route::get('user/teste', ['as' => 'teste', 'uses' => 'UserController@teste']);


Route::get('/teste', ['as' => 'user.teste', 'uses' => function () {

    $arrayTeste = RepositoryProblem::getRepositoryProblem(1,'BAFO','sameque');

    foreach($arrayTeste as $i){

        echo $i['result'].'</br>';
    }
//    return $arrayTeste;
}]);

Route::get('dashboard2/{competition_id}',['as' => 'submissionUpdate', 'uses' => 'SubmissionController@update']

//    $user = User::findOrNew(1);
//
//        foreach($user->userRepository as $userRepository){
//
//            $attributes =  RepositoryUser::getRepositoryUser(
//                $userRepository->repository_id,
//                $userRepository->username
//            );
//
//            $problemSolvedController = new ProblemSolvedUserController();
//            $problemUnsolvedController = new ProblemUnsolvedUserController();
//
//            $problemSolvedController->store($userRepository->id,$attributes->problemSolved);
//            $problemUnsolvedController->store($userRepository->id,$attributes->problemUnsolved);
//
//            $userRepository->problemSolvedUser;
//            $userRepository->problemUnsolvedUser;
//            $userRepository->repository;
//        }
//
//    return 'dashboard2';
//    return $userRepository;
);

Route::get('dashboard1', function () {



//    $user = User::all();
//
//    foreach($user as $i){
//        $i->userRepository;
//    }
//
//    return $user;
//

    $submission  = App\Submission::all();

    foreach ($submission as $i){

        $i->competition;
        foreach($i->user->userRepository as $j){$j->repository;}

    }

    return $submission;


//    $userRepository = UserRepository::find(14);
//
//    $userRepository->problemUnsolvedUser()->delete();
//    $userRepository->problemSolvedUser()->delete();
//    $userRepository->delete();
//
//    $userRepository->problemUnsolvedUser;
//    $userRepository->problemSolvedUser;
//    return $userRepository;
//


//    $userRepository->repository;
//    $userRepository->user;

//    $userRepository->problemSolvedUser()->detach(1);


//    dd($problemSolvedUser);
//
//    $userRepository = UserRepository::find(1);
//    $teste = RepositoryUser();
//    $resp = $teste->getRepositoryUser($userRepository);
////    $resp->getUserRepository($userRepository);
//
//    dd($resp->problemSolved);


//
//    User::create([
//        'name'=>'userTeste',
//        'accessLevel'=>1,
//        'email'=>'teste@teste.com',
//        'cpf'=>'111.111.111-11',
//        'password'=>'123456',
//        'rg'=>'123456789',
//        'yearCourse'=>2001,
//        'birthDate'=>'2001-01-01',
//        'graduated'=>2001,
//        'username'=>'userTeste',
//        'created_at'=>'2001-01-01 00:00:00',
//        'updated_at'=>'2015-01-01 00:00:00'
//    ]);


//
//    dd($user);
//
//    $array = array('name' => 'sameque','idade' => 32);
//    return $array['idade'];

//    $userrepository = new \App\UserRepository();
//    $userrepository->username = 'Menoto';

//    $user = \App\User::find(1);
//    dd($user->toJson());

//    $repository = \App\Repository::find(1);

//    $repository->userRepository();
//    $user->userRepository();

//    $repository->userRepository()->save($userrepository);
//
//    $user->userRepository()->save($userrepository);

//    $casandra = array();

//    $ur = $user->userRepository;
//
//    foreach ($ur as $value) {
//        $value->repository;
//    }
////    var_dump($casandra);
//
//    return $user;//array(1=>$user,2=>$user->userRepository);
});