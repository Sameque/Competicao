<?php

namespace App\Http\Controllers;

use App\Repository;
use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\Controller;
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
        Repository::create($request->request->all());
        return redirect()->route('create.repository');
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
