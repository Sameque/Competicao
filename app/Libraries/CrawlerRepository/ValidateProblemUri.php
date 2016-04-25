<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

namespace App\Libraries\CrawlerRepository;

use Symfony\Component\DomCrawler\Crawler;


class ValidateProblemUri
{

    public function validationProblem($problem)
    {
//        dd('ValidateProblemUri >> validationProblem',$problem);

        $urlProblem = URL_PROBLEMS_URI.$problem.'/';

//        dd('ValidateProblemUri >> validationProblem',$urlProblem);

        if($this->getHTML($urlProblem) != '200' ){
            return false;
        } else {
            return $this->validateProblem($urlProblem,$problem);
        }
    }

    private function validateProblem($url,$problem){

//        dd('validationProblem >> validateProblem',$url,$problem);
        $html = file_get_contents($url);
        
        $crawler = new Crawler($html);
        
//        $crawler = $crawler->filter('body > div > div > div > div > div > table > tr > td a')->eq(0);

        $crawler = $crawler->filter('a')->eq(13);


        $urlAuxi = $crawler->attr('href');

//        dd('validationProblem >> validateProblem',$urlAuxi);


        $urlAuxi = $this->formatName($urlAuxi);

//        dd('validationProblem >> validateProblem',$urlAuxi,$problem);


        if($urlAuxi == $problem)
            return true;
        else
            return false;
    }

    private function getHTML($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    public function formatName($name){
        return substr($name,24,100);
    }


}