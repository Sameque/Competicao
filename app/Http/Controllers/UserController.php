<?php

namespace App\Http\Controllers;

//use Requests;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\EventDispatcher\Tests\EventDispatcherTest;

class UserController extends Controller
{
    public function index()
    {
        $user = new User();
        $users = $user->all();
        return view('list.user')->with('users', $users);
//        return view('list.users');

        //User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('register.user');
    }

    public function store(CreateUserRequest $request)
    {
        $id = $this->insert($request);

        return Redirect::route('edit.user', $id);
    }

    public function insert(CreateUserRequest $request)
    {
        $user = new User($request->all());

        if ($request->input('graduated') == 'value')
            $user->graduated = 1;
        else
            $user->graduated = 0;
        $user->save();

        return $user->id;
    }

    public function show($id)
    {
        return User::findOrNew($id);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('edit.user', compact('user'));
//        return view('edit.user', compact('user'));
//        $user = User::find($id);
//        return view('edit.user')->with('user',$user);

    }

    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->fill($request->all());
        $user->password = bcrypt($request->input('password'));

        if ($request->input('graduated') == 'value'){
            $user->graduated = 1;
        }
        else {
            $user->graduated = 0;
        }

//        dd($user);

        $user->save();
//

        return redirect()->route('list.users');
//        return $request;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();


        return redirect()->route('list.users');
    }

    public function users()
    {
        return User::all();
    }

//    public function userrepository(CreateUserRequest $request){
//
////        $this->insert($request);
////        return $request;
//        return 'Teste!!!';
//    }
    public function teste(){
        $user = User::findOrFail(28);

        return view('register.repository', compact('user'));
//        return $user;

//        return redirect()->route('list.users');
//          return view('index');
//        return User::all();
    }
}