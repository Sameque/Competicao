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
    private $htmlSubmission;
    private $htmlProblem;



    public function getProblem($problem,$username)
    {
        if($username != null and $problem == null) {
            $this->htmlProblemUser = file_get_contents(URL_PROBLEMS__USER_SPOJ.$username.'/');
            return $this->getProblemUsers();

        } else if ( $username != null and $problem != null){
            $this->htmlSubmission = file_get_contents(
            URL_PROBLEMS__USER_SPOJ.$problem.','.$username.'/'
                    );

            return $this->getSubmissions();
        } else {
            dd('[RepositoryProblemSpoj] => '.' {não implementado}');
//        $this->htmlProblem = file_get_contents(URL_PROBLEMS_SPOJ.$problem.'/');
//            $attributes = array(
//                'name' => $this->getName(),
//                'code' => $problem,
//                'content' => $this->getProblemContent(),
//            );

        }

//        dd($attributes);

        return false;
    }

    private function getSubmissions(){

        $crawler = new Crawler($this->htmlSubmission);
        
        $crawler = $crawler->filter('body > div > div > div > div > div > form > table > tr > td');

        $i=1;
        $k=2;
        $p=3;
        $y=6;

        $problems = null;
        $problem = null;

        foreach($crawler as $key => $domElement){

//            echo $key.' => '.$domElement->nodeValue.'<br/>';
            $problem['problem_id'] = 0;

            if ($key == $i){
                $problem['date'] = substr($domElement->nodeValue, 2,10);
                $problem['hours'] = substr($domElement->nodeValue, 13,8);
                $i+=7;
            }

            if ($key == $k){
                $problem['name'] =$domElement->nodeValue;

                $html2=$domElement->ownerDocument->saveHTML($domElement);
                $crawler2 = new Crawler($html2);

                $code = $crawler2->filter('a')->attr('href');
                $code = substr($code,10,100);
                $code = substr($code,0,strlen($code)-1);

                $problem['code'] = $code;

                $k+=7;

            }
            
            if ($key == $p){
                $problem['result'] = $this->formatField($domElement->nodeValue);
                $p+=7;
            }

            if ($key == $y){
                $problem['language'] = $this->formatField($domElement->nodeValue);
            }

            if($key == $y){
                $problems[]=$problem;
                $problem = null;
                $y+=7;

            }
        }
        //dd($problems);
        return $problems;
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


}