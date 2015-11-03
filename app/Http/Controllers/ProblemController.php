<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Http\Requests;
use App\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProblemController extends Controller
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
    public function create($competition_id)
    {
        return view('register.problem', compact('competition_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'code' => 'required',
//            'dificult' => 'required',
            'repository_id' => 'required',
        ]);


        $validator->sometimes('code', 'problem', function($input) {
            return $input->repository_id > 0;
        });

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput($request->all());
        }

        dd('Gravando!!!!');

        $problem = new Problem($request->all());
//        $competition = Competition::find($request->input('competition_id'));
        $problem->save();

        $competition_id = $problem->competition_id;

        return view('register.problem', compact('competition_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $problem = Problem::find($id);
        $problem->repository;
        return $problem;
    }

    public function showProblemCompetition($competition_id)
    {
        $competition = Competition::find($competition_id);
        return $competition->problems;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        $competition_id = $this->toDestroy($id);
        return view('register.problem', compact('competition_id'));
    }

    public function toDestroy($id)
    {
        $problem = Problem::find($id);
        $competition_id = $problem->competition_id;
        $problem->delete();
        return $competition_id;
    }

}
