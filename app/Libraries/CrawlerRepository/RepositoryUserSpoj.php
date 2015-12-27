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


class RepositoryUserSpoj
{   
//    private $name;
    private $html;



    public function getUserRepository($username)
    {

        $this->html = file_get_contents(URL_USER_SPOJ.$username.'/');

//        $problemSolvedController = new ProblemSolvedUserController();
//        $problemUnsolvedController = new ProblemUnsolvedUserController();

        //Delete registers problem solved
//        $problemSolvedController->destroy($userRepository->id);
        //get and save register problem solved
//        $problemSolvedController->store($userRepository->id,$this->getProblemSolved());


        //Delete registers problem unsolved
//        $problemUnsolvedController->destroy($userRepository->id);
        //get and save register problem unsolved
//        $problemUnsolvedController->store($userRepository->id,$this->getProblemUnsolved());

//        $userRepository->name = $this->getName();

        $attributes = array(
            'name' => $this->getName(),
            'username' => $this->getUserName(),
            'problemSolved' => $this->getProblemSolved(),
            'problemUnsolved' => $this->getProblemUnsolved(),
            );

        return $attributes;
//        return $userRepository;
    }

    private function getName(){

        $crawler = new Crawler($this->html);

        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > h3');

        $userAuxi ='';
        foreach ($crawler as $domElement) {
            $userAuxi = $domElement->nodeValue;
        }
        return substr($userAuxi, 18,150);
    }

    private function getUserName(){

        $crawler = new Crawler($this->html);

        $crawler = $crawler->filter('body > div > div')->eq(1)
            ->filter('div > div > table')->eq(0)->filter('tr > td')->eq(1);

        $userAuxi ='';
        foreach ($crawler as $domElement) {
            $userAuxi = $domElement->nodeValue;
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