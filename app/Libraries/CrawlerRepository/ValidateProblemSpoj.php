<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

//namespace App\CrawleRepository;
namespace App\CrawlerRepository;
//namespace App;

use Symfony\Component\DomCrawler\Crawler;

define("URL_PROBLEMS_SPOJ", 'http://br.spoj.com/problems/');

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

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('table')->eq(1)->filter('h2')->eq(1);

        $userAuxi = '';

        foreach ($crawler as $domElement) {
            $userAuxi = $domElement->nodeValue;
        }

        $userAuxi = substr($userAuxi, 10, strlen($problem));

        if($userAuxi == $problem)
            return true;
        else
            return false;
    }

    private function getHTML($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}