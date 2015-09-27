<?php

namespace App\Http\Controllers;

use App\Repository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Repository::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('register.repository');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateRepositoryRequest $request)
    {
//        $messages = ['urlvalid'=>'Ops muleki ta errado esse treco!!!'];
//
//        Validator::extend('urlvalid',function($attribute,$value,$parameters){
//
//            return false;
//        });

//
//        $validator = Validator::make($request->all(),[
//            'url' => 'required|urlvalid'
//        ]);

//        var_dump($validator->errors());

//        if($validator->fails()){
//            return redirect()->back()
//                ->withErrors($validator->errors())
//                ->withInput($request->all());
//        }



        dd('Registro gravado no banco!!!');

        Repository::create($request->request->all());
        return redirect()->route('create.repository');
    }

    public function save(Requests\CreateRepositoryRequest $request){
//
//        $url = $request->get('url');
//
//        if (substr($url, -1) == '/') {
//            $url = substr($url, 0, -1);
//        }
//
//
//        if (strripos($url, 'https') === 0) {
//            $url = substr($url,8,strlen($url)-8);
//        } elseif (strripos($url, 'http') === 0) {
//            $url = substr($url, 7, strlen($url) - 7);
//        }
//
////        dd($request->request->all());
//
//        $request->request->set('url',$url);  //$this->request->set('url',$url);
//        dd($request);

        $res = Requests\CreateRepositoryRequest::create(
            '',
        'POST',
            array("_token" => "WNscJYLX0WOeKS7vjmYzxmI8D095ppJfuGhzOfRZ","name" => "","url" => "http://br.spoj.com/")
        );
        $res->

        dd($request);
//        $this->store();
//        return $this->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Repository::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $repository = Repository::find($id);
        $repository->delete();
    }
}
