<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

namespace App\Libraries\CrawlerRepository;

use Symfony\Component\DomCrawler\Crawler;


class ValidateProblemSpoj
{

    public function validationProblem($problem)
    {
        $urlProblem = URL_PROBLEMS_SPOJ.$problem.'/';

        if($this->getHTML($urlProblem) != '200' ){
            return false;
        } else {
            return $this->validateProblem(URL_PROBLEMS_SPOJ.$problem,$problem);
        }
    }

    private function validateProblem($url,$problem){
         
        $html = file_get_contents($url);
        
        $crawler = new Crawler($html);
        
        $crawler = $crawler->filter('body > div > div > div > div > div > table > tr > td a')->eq(0);
        
        if($crawler->count() <= 0){return false;}
            
        $urlAuxi = $crawler->attr('href');
        
        $urlAuxi = substr($urlAuxi,8,100);

        $urlAuxi = substr($urlAuxi,0,strlen($urlAuxi)-1);
        
        if($urlAuxi == $problem)
            return true;
        else
            return false;
    }

    private function getHTML($url) {
        $headers = get_headers($url);
        return substr($headers[9], 9, 3);
    }
}