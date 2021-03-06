<?php
/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 14/11/2015
 * Time: 08:37
 */

namespace App\Libraries\DateTime;


use Carbon\Carbon;

class DateTime {


    public  function  timeElapsed( $timeInit, $timeEnd){

        $timeInit = explode(':',$timeInit);
        $timeEnd = explode(':',$timeEnd);

        $timeInitMin = ($timeInit[0]*60)+$timeInit[1];
        $timeEndMin = ($timeEnd[0]*60)+$timeEnd[1];

        $elapsed = $timeEndMin - $timeInitMin;

        return $elapsed;
    }

    public  function  addTimeInDate($date, $time){
        $time = new Carbon($time);
        return Carbon::create($date->year,$date->month,$date->day,$time->hour,$time->minute,$time->second);
    }

    /**
     * Corrige a diferença de horas do repositório
     *
     * @param $time
     * @param $repository
     * @return bool|string
     */
    public function diffTimeRepository($time,$repository){

        if($repository == 'Spoj'){
            $hrDiff = 240;

            return date('H:i:s', strtotime('+ '.$hrDiff.' minute', strtotime($time)));
        }
        return $time;
    }
} 