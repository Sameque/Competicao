<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRepositoryRequest;
use App\Repository;
use App\User;
use App\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $userrepository = new UserRepository($request->all());

        $user = User::find($request->input('user_id'));
        $repository = Repository::find($request->input('repository_id'));

        $repository->userRepository()->save($userrepository);
        $user->userRepository()->save($userrepository);

        $id = $user->id;

        return view('register.userrepository', compact('id'));
//        return redirect()->route('user.userrepository');
//        return $repository;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($userRep_id)
    {
        $userrepository = UserRepository::find($userRep_id);
        $id = $userrepository->user->id;
        $userrepository->delete();

        return view('register.userrepository', compact('id'));
    }
}
