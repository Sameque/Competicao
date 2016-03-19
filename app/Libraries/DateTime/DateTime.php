<?php
/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 14/11/2015
 * Time: 08:37
 */

namespace App\Libraries\DateTime;


class DateTime {


    public  function  timeElapsed( $timeInit, $timeEnd){

        $timeInit = explode(':',$timeInit);
        $timeEnd = explode(':',$timeEnd);

        $timeInitMin = ($timeInit[0]*60)+$timeInit[1];
        $timeEndMin = ($timeEnd[0]*60)+$timeEnd[1];

        $elapsed = $timeEndMin - $timeInitMin;

        return $elapsed;
    }
} 