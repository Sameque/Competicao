<?php

namespace App\Http\Controllers;

//use App\Repository;
use App\Competition;
//use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

//use App\Http\Controllers;

class CompetitionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $competitions = Competition::all();
        return view('list.competition')->with('competitions', $competitions);
    }

    public function listCompetition() {
        return view('list.competition');
    }

    public function competitionUsers($competiton_id) {
        $competition = Competition::find($competiton_id);
        return $competition->users;
    }


    public function competitionUserStore(Request $request) {
        $competition = Competition::find($request->input('competition_id'));
        $competition->users()->attach($request->input('user_id'));

        return $this->competitionUser($competition->id);
    }

    /**
     * Show the form for creating a new resource.
     *        return view('edit.competition', compact('competition'));
     * @return Response
     */
    public function create() {
        return view('register.competition');
    }

    /**
     * Exibir view de usuários de uma competição
     * @param type $competition_id
     * @return type
     */
    public function competitionUser($competition_id) {
        $competition = Competition::findOrNew($competition_id);
        $users = $competition->users;
        $allUsers = User::all();

        return view('register.competitionUser', [
            'competition' => $competition,
            'users' => $users,
            'allUsers' => $allUsers
                ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        $competition = new Competition($request->all());

        $competition->save();
        return $this->edit($competition->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        $competition = Competition::find($id);
        foreach ($competition->problems as $i) {
            $i->repository;
        }
        return $competition;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        
        
        $competition = Competition::find($id);
        
        return view('edit.competition', [
            'competition' => $competition,
            'problems' => $competition->problems,
            'users' => $competition->users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    
    
    public function update(Request $request, $id) {
        $competition = Competition::find($id);
        $competition->fill($request->all());

        $competition->save();
        return $this->edit($competition->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response 
     */
    public function destroy($competition_id) {


        $competition = Competition::find($competition_id);

        $problemController = new ProblemController();

        foreach ($competition->problems as $i) {
            $temp[] = $problemController->toDestroy($i->id);
        }

        foreach ($competition->users as $i) {
            $temp[] = $this->toUserDestroy($competition_id, $i->id);
        }

        $competition->delete();

        return $this->index();
    }

    public function userDestroy($competition_id, $user_id) {
        $this->toUserDestroy($competition_id, $user_id);
        return $this->competitionUser($competition_id);
//        return view('register.competitionUser', compact('competition_id'));
    }

    public function toUserDestroy($competition_id, $user_id) {

        $competition = Competition::find($competition_id);
        $competition->users()->detach($user_id);
        return $competition_id;
    }

}
