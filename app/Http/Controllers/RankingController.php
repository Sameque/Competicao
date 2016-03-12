<?php

namespace App\Http\Controllers;

use App\Competition;
use App\ProblemCompetition;
use App\Ranking;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($competition_id)
    {
        
        
        dd($this->makeRanking($competition_id));
        
dd("aqui",'RankingController@show');
        $ranking = Ranking::find($competition_id);

        return view('list.ranking')->with('ranking', $ranking);
    }

    /**
     * @param integer $competition_id
     * @return array(Ranking) ranking
     */

    public function makeRanking($competition_id){


        $competition = Competition::findOrNew($competition_id);
        
        return $competition->problems;
/*
        foreach($competition->problems as $problem){
            echo $problem->code.'</br>';
        }
        
        $problem = new ProblemCompetition();



        $problem->user_id = 1;
        $problem->competititon_id = $competition_id;
        $problem->sumission_qt = 1;
        $problem->problem = 1;

        return array('ranking' => new Ranking());
        */
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
