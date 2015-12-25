<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

namespace App\Libraries\CrawlerRepository;

use App\Http\Controllers\ProblemSolvedUserController;
use App\Http\Controllers\ProblemUnsolvedUserController;
use App\ProblemSolvedUser;
use App\ProblemUnsolvedUser;
use Symfony\Component\DomCrawler\Crawler;

define("URL_USER_SPOJ", 'http://br.spoj.com/users/');

class RepositoryUserSpoj
{   
    private $name;
    private $userName;
    private $problemSolved;
    private $problemUnsolved;
    private $url;
    private $html;



    public function getUserRepository($userRepository)
    {
        $this->url = URL_USER_SPOJ.$userRepository->username.'/';
//        $this->html = file_get_contents($this->url);
        $problemSolvedController = new ProblemSolvedUserController();
        $problemUnsolvedController = new ProblemUnsolvedUserController();

        //Delete registers problem solved
        $problemSolvedController->destroy($userRepository->id);
        //get and save register problem solved
        $problemSolvedController->store($userRepository->id,$this->getProblemSolved());

        //Delete registers problem unsolved
        $problemUnsolvedController->destroy($userRepository->id);
        //get and save register problem unsolved
        $problemUnsolvedController->store($userRepository->id,$this->getProblemUnsolved());

        $userRepository->name = $this->getName();

        return $userRepository;
    }

    private function getName(){

        $html = file_get_contents($this->url);
        $crawler = new Crawler($html);
        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > h3');

        $userAuxi ='';
        foreach ($crawler as $domElement) {
            $userAuxi = $domElement->nodeValue;
        }
        return substr($userAuxi, 18,150);
    }

    private function getUserName(){

        $html = file_get_contents($this->url);
        $crawler = new Crawler($html);
        $crawler = $crawler->filter('body > div > div')->eq(1)
            ->filter('div > div > table')->eq(0)->filter('tr > td')->eq(1);

        $userAuxi ='';
        foreach ($crawler as $domElement) {
            $userAuxi = $domElement->nodeValue;
        }
        return $userAuxi;
    }

    private function getProblemSolved(){

        $html = file_get_contents($this->url);
        $crawler = new Crawler($html);

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > table')->eq(1)->filter('td');

        $userAuxi ='';
        foreach ($crawler as $key => $domElement) {
            if($domElement->nodeValue != "") {
                $userAuxi[] = new ProblemSolvedUser(array('problem'=> $domElement->nodeValue));
            }

        }
        return $userAuxi;
    }

    private function getProblemUnsolved(){

        $html = file_get_contents($this->url);
        $crawler = new Crawler($html);

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > table')->eq(2)->filter('td');

        $userAuxi ='';
        foreach ($crawler as $key => $domElement) {
            if($domElement->nodeValue != "") {
                $userAuxi[] = new ProblemUnsolvedUser(array('problem'=> $domElement->nodeValue));
            }

        }
        return $userAuxi;
    }

    private function deleteProblemSolved(){

        $html = file_get_contents($this->url);
        $crawler = new Crawler($html);

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > table')->eq(1)->filter('td');

        $userAuxi ='';
        foreach ($crawler as $key => $domElement) {
            if($domElement->nodeValue != "") {
                $userAuxi[] = new ProblemSolvedUser(array('problem'=> $domElement->nodeValue));
            }
        }
        return $userAuxi;
    }

}