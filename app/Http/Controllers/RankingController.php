<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Libraries\DateTime\DateTime;
use App\ProblemCompetition;
use App\Ranking;
use App\Submission;
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
    public function index($competition_id)
    {
        $competition = Competition::findOrNew($competition_id);
        $submission = new SubmissionController();
        $submissions = $submission->update($competition_id);
        $dateTime = new DateTime();
        $rankings = '';



        foreach ($competition->users as $user){

            $ranking['name'] = $user->name;

            $rankingProblem = '';

            foreach($competition->problems as $problem){
//                $item['code'] = $problem->code;
                $item['time'] = 0;
                $item['qt'] = 0;
                $item['resp'] = false;

                if($submissions){
                    foreach ($submissions as $i){
                        if ($i['problem_id'] == $problem->id and  $user->id == $i['user_id']){

                            if($i->result == 'accepted'){
                                $item['resp'] = true;
                                $item['time'] = $dateTime->timeElapsed($competition->hoursBegin,$i->hours);
                            }
                            $item['qt'] = $item['qt']+1;
                        }
                    }
                }

                $rankingProblem[]=$item;
            }

            $ranking['problems'] = $rankingProblem;

            $rankings[]=$ranking;
        }

//        dd('RankingController@update',$rankings);

        return view('list.ranking')->with(['rankings'=> $rankings,'problems'=> $competition->problems]);

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
