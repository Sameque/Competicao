<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Competition::all();
    }

    public function listCompetition()
    {
        return view('list.competition');
    }

    public function competitionUsers($competiton_id)
    {
        $competition = Competition::find($competiton_id);
//        $competition->users()->attach(48);
        return $competition->users;
    }


    /**
     * Show the form for creating a new resource.
     *        return view('edit.competition', compact('competition'));
     * @return Response
     */
    public function create()
    {
        return view('register.competition');
    }

    public function competitionUser($competition_id)
    {
        return  view('register.competitionUser', compact('competition_id'));
//        return view('register.competitionUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $competition = new Competition($request->all());
//        dd($competition);
        //UserRepository($request->all());
        $competition->save();

//        $id = $competition->id;
        return $this->edit($competition->id);
//        return view('edit.competition', compact('competition'));
//        return view('edit.competition', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
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
    public function edit($id)
    {
        $competition = Competition::find($id);
        return view('edit.competition', compact('competition'));
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
        $competition = Competition::find($id);
        $competition->fill($request->all());
        $competition->save();

        return view('edit.competition', compact('competition'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return $id;
//        $competition = Competition::find($id);
//        $name = $competition->name;
//        $competition->delete();
//        return 'Competição '.$name.' Apagada';
    }
}
