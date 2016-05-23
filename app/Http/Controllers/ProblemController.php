<?php

namespace App\Http\Controllers;

use App\Competition;
//use App\Http\Requests;
use App\Problem;
use App\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProblemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($competition_id) {

        $competition = Competition::findOrNew($competition_id);

        $problems = $competition->problems;
        $repositorys = Repository::all();

        return view('register.problem', [
            'repositorys' => $repositorys,
            'problems' => $problems,
            'competition_id' => $competition_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {

//        dd('ProblemController >> store',$request);
        $validator = Validator::make($request->all(), [
                    'code' => 'required',
                    'repository_id' => 'required',
        ]);

        if ($request->repository_id == 1) {
            $validator->sometimes('code', 'problemspoj', function ($input) {
//                dd('ProblemController >> store >> sometimes 1', $input);
                return $input->repository_id > 0;
            });
        } elseif ($request->repository_id == 2){
            $validator->sometimes('code', 'problemuri', function ($input) {
//                dd('ProblemController >> store >> sometimes 2', $input);
                return $input->repository_id > 0;
            });
        } elseif ($request->repository_id == 3){
            $validator->sometimes('code', 'problemuva', function ($input) {
//                dd('ProblemController >> 'store >> sometimes 3', $input);
                return $input->repository_id > 0;
            });
        }

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator->errors())
                            ->withInput($request->all());
        }

        $problem = new Problem($request->all());
        $problem->save();

        return $this->create($problem->competition_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        $problem = Problem::find($id);
        $problem->repository;
        return $problem;
    }

    public function showProblemCompetition($competition_id) {
        $competition = Competition::find($competition_id);
        return $competition->problems;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        
        $problem = Problem::find($id);

        if ($problem == null) {
            return redirect()->back()
                            ->withErrors('Registro não encontrado')
                            ->withInput([]);
        }

        $competition_id = $problem->competition_id;
        $problem->delete();

        return $this->create($competition_id);
    }

    public function toDestroy($id){
        $problem = Problem::find($id);
        $competition_id = $problem->competition_id;
        $problem->delete();
        return $competition_id;
    }
}
