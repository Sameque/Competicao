<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

namespace App\Libraries\CrawlerRepository;

use App\ProblemSolvedUser;
use App\ProblemUnsolvedUser;
use Symfony\Component\DomCrawler\Crawler;


class RepositoryProblemSpoj
{   
    private $htmlProblemUser;
    private $htmlProblem;



    public function getProblem($problem,$username)
    {

        $this->htmlProblemUser = file_get_contents(URL_PROBLEMS__USER_SPOJ.$username.'/');

//        $this->htmlProblem = file_get_contents(URL_PROBLEMS_SPOJ.$problem.'/');

        if($username == null) {
            dd('[RepositoryProblemSpoj] => '.' {não implementado}');
//            $attributes = array(
//                'name' => $this->getName(),
//                'code' => $problem,
//                'content' => $this->getProblemContent(),
//            );
        } else{

            $attributes = $this->getProblemUsers();
        }

//        dd($attributes);

        return $attributes;
    }

    private function getName(){


        $crawler = new Crawler($this->htmlProblem);


        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('h1');

        $userAuxi ='';
        foreach ($crawler as $domElement) {
            $userAuxi = $domElement->nodeValue;
        }

        return $userAuxi;
    }
    private function getProblemContent(){

        $crawler = new Crawler($this->htmlProblem);

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('p');

        $userAuxi ='';
        foreach ($crawler as $domElement) {
            $userAuxi = $userAuxi.$domElement->nodeValue.'</br></br>';
        }
        return $userAuxi;
    }




    private function getProblemUsers(){

        $crawler = new Crawler($this->htmlProblemUser);

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('table')->eq(1)->filter('td');

        $i = 1;
        $w = 2;
        $k = 3;
        $j = 6;
        $userAuxi ='';
        $register='';

        foreach ($crawler as $key => $domElement) {


            if( $key == $i and $domElement->nodeValue <> '') {
                $register['date'] = substr($domElement->nodeValue, 2,10);
                $register['hours'] = substr($domElement->nodeValue, 13,8);

                $i = $i +7;
            }

            if ($key == $w) {

                $html2=$domElement->ownerDocument->saveHTML($domElement);

                $crawler2 = new Crawler($html2);
                $crawler2 = $crawler2->filter('a');

                $problem = $crawler2->attr('href');
                $problem = substr($problem,10,100);
                $leanString = strlen($problem);
                $problem = substr($problem,0,$leanString-1);

                $register['problem'] = $problem;

                $w = $w + 7;
            }


            if( $key == $k and $domElement->nodeValue <> '') {
//                $register['result'] = $domElement->nodeValue;
                $register['result'] = $this->formatField($domElement->nodeValue);
                $k = $k +7;
            }

            if( $key == $j and $domElement->nodeValue <> '') {
                $register['language'] = $this->formatField($domElement->nodeValue);
            }

            if($key == $j){
                $userAuxi[] = $register;
                $register='';
                $j = $j +7;
            }
        }

        return $userAuxi;
    }


    private function getDate(){

        $crawler = new Crawler($this->html);

        $crawler = $crawler->filter('body > div > div')
            ->eq(1)->filter('table ')->eq(1)->filter('td');

        $userAuxi='';
        $i = 1;
        foreach ($crawler as $key => $domElement) {
            if( $key == $i ){
                $userAuxi[] = $domElement->nodeValue . '</br>';
                $i = $i +7;
            }
        }
        return $userAuxi;
    }

    private function getProblemSolved(){

        $crawler = new Crawler($this->html);

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > table')->eq(1)->filter('td');

        $userAuxi ='';
        foreach ($crawler as $key => $domElement) {
            if($domElement->nodeValue != "") {
                $userAuxi[] = new ProblemSolvedUser(array('problem'=> $domElement->nodeValue));
            }

        }
        return $userAuxi;
    }

    /**
     * Formatar a o campo resultado retirando os '\n' e '\t')
     *
     * @param $result string
     * @return string
     */
    private function formatField($result){

        $retorno='';

        for($i=0; $i<strlen($result); $i++ ){
            if ( (substr($result,$i-1,1) != "\n") and (substr($result,$i-1,1) != "\t") ){
                $retorno = $retorno.substr($result,$i-1,1);
            }
        }

        return $retorno;

    }
    private function getProblemUnsolved(){

        $crawler = new Crawler($this->html);

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > table')->eq(2)->filter('td');

        $userAuxi ='';
        foreach ($crawler as $key => $domElement) {
            if($domElement->nodeValue != "") {
                $userAuxi[] = new ProblemUnsolvedUser(array('problem'=> $domElement->nodeValue));
            }

        }
        return $userAuxi;
    }
}