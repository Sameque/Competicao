<?php
/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/11/2015
 * Time: 19:43
 *
 */

namespace App\Libraries\DateTime;


use App\Competition;

class DateTimeCompetition {

    private $competittion;


    public function __construct($competition_id)
    {
        $this->competittion = Competition::find($competition_id);
    }

    function start (){
//        //$inicio = DateTime::createFromFormat('Y-m-d H:i:s', $competition->dateBegin.$competition->hoursBegin);


        $inicio = \DateTime::createFromFormat('Y-m-d H:i:s', $this->competittion->dateBegin.$this->competittion->hoursBegin);
//        $teste = \DateTime::createFromFormat()

//        $this->competittion->dateBegin.' '.$this->competittion->hoursBegin
        $now1 =  new \DateTime();

//        //dd($inicio);
//        $intervalo = $inicio->diff($hrs);
//
//        if($inicio > $hrs){echo 'Falta: '.$intervalo->format('%Y-%m-%d %H:%I:%S');}
//        else { echo 'Inicio '.$inicio->format('d/m/y h:i:s');}
//
////                echo $intervalo->format('%Y-%m-%d %H:%I:%S');//.'-'.$competition->dateBegin.$competition->hoursBegin;
//
//
//        //dd($intervalo);
//        //echo $intervalo;
//        return $this->competittion;
        return $inicio->format('d/m/y H:i').' '.$now->format('d/m/y H:i');

    }

    function end ($competition_id){

    }


} 