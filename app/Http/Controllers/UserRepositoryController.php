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
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'repository_id' => 'required',
        ]);


        $validator->sometimes('username', 'userspoj', function($input) {
//            dd($input);
            return $input->repository_id > 0;
        });

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput($request->all());
        }

        $userRepository = UserRepository::create($request->all());

        $userRepository =  RepositoryUser::getRepositoryUser($userRepository);

        $id = $request->input('user_id');

        return view('register.userrepository', compact('id'));
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
    public function edit($id)
    {
//        $userRepositorys =  User::findOrFail($id)->userRepository;

        return view('register.userrepository', compact('id'));
//        return 'Teste userrepository';
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

        return view('register.userrepository', compact('id'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($userRepositpry_id)
    {
        $userRepository = UserRepository::find($userRepositpry_id);

        $id = $userRepository->user->id;

//        $userRepository->problemUnsolvedUser()->delete();
//        $userRepository->problemSolvedUser()->delete();
//        $userRepository->delete();

        dd('Userrepositorycontroll');

        return view('register.userrepository', compact('id'));
    }
}
