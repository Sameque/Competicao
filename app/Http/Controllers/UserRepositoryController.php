<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Libraries\CrawlerRepository\RepositoryUser;
use App\Repository;
use App\User;
use App\UserRepository;
use Illuminate\Http\Request;

class UserRepositoryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     *
     * Requests\CreateUserRepositoryRequest
     */
    public function store(Request $request,$id)
    {
        $userRepository = new UserRepository($request->all());
        $userRepository->save();

        return $this->edit($userRepository->id);
    }

    /**
     * DESCONTINUADO
     * @param UserRepository $userRepository
     */
    public function updateUserRepository(UserRepository $userRepository){

        $problemSolvedController = new ProblemSolvedUserController();
        $problemUnsolvedController = new ProblemUnsolvedUserController();
        //Limpando registro de problemas do repositório
        $problemSolvedController->destroy($userRepository->id);
        $problemUnsolvedController->destroy($userRepository->id);

        $atributes = RepositoryUser::getRepositoryUser($userRepository->repository_id, $userRepository->username);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $userrepositorys = User::findOrFail($id)->userRepository;
        foreach ($userrepositorys as $value) {
            $value->repository;
        }
        return $userrepositorys;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($user_id)
    {
        $userrepository = new UserRepository();
        $repositorysAll = Repository::all();
        $repositorys=false;
        $userRepositorys = User::findOrNew($user_id)->userRepository;
        $repositorys = [];

        foreach($repositorysAll as $repository){
            $repositorys[$repository->id] = $repository->name;
        }

        return view('register.userrepository', [
            'user_id'=>$user_id,
            'repositorys'=>$repositorys,
            'userRepositorys'=>$userRepositorys,
            'userrepository'=>$userrepository
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */

    public function update($userRepository)
    {
        $userRepository =  RepositoryUser::getRepositoryUser($userRepository);
        $id = $userRepository->user_id;

        return $this->edit($id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($userRep_id)
    {
        $userRepository = UserRepository::find($userRep_id);
        $id = $userRepository->user_id;
        $userRepository->problemUnsolvedUser()->delete();
        $userRepository->problemSolvedUser()->delete();
        $userRepository->delete();

        return $this->edit($id);
    }
}