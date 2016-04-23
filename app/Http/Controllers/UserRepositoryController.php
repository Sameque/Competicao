<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Libraries\CrawlerRepository\RepositoryUser;
use App\Repository;
use App\User;
use App\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd('store',$request->repository_id);

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'repository_id' => 'required',
        ]);

        if($request->repository_id == 1) {
            $validator->sometimes('username', 'userspoj', function ($input) {
//                dd('store >> $validator >> 1', $input);
                return $input->repository_id > 0;
            });
        }elseif ($request->repository_id == 2){
            $validator->sometimes('username', 'useruri', function ($input) {
//                dd('store >> $validator >> 2', $input);
                return $input->repository_id > 0;
            });
        }elseif ($request->repository_id == 3){
            $validator->sometimes('username', 'useruva', function ($input) {
                dd('store >> $validator >> 3', $input);
                return $input->repository_id > 0;
            });
        }

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput($request->all());
        }

        $userRepository = UserRepository::create($request->all());

        $this->updateUserRepository($userRepository);

        $id = $request->input('user_id');

        return $this->edit($id);
    }

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
//        dd($user_id);
        $repositorysAll = Repository::all();
        $repositorys=false;
        $userRepositorys = User::findOrNew($user_id)->userRepository;

        foreach ($userRepositorys as $userRepository) {
            $userRepository->repository;
        }
        foreach($repositorysAll as $repository){
            $repositorys[$repository->id] = $repository->name;
        }

        return view('register.userrepository', [
            'user_id'=>$user_id,
            'repositorys'=>$repositorys,
            'userRepositorys'=>$userRepositorys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
//    public function update(Request $request, $id)
//    {
//
//    }

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
