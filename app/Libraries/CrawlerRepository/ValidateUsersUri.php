<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

//namespace App\CrawleRepository;
namespace App\Libraries\CrawlerRepository;
//namespace App;

use Symfony\Component\DomCrawler\Crawler;

class ValidateUsersUri
{
    public function validateUser($username)
    {
//        dd('ValidateUsersUri >> validateUser',$username);

        $urlValidate = URL_USER_URI_VALIDATE.$username.'/';

//        dd('ValidateUsersUri >> validateUser',$urlValidate);


        if($this->getHTML($urlValidate) != '200' ){
            return false;
        } else {
            return $this->validateUserName($urlValidate,$username);
        }
    }

    private function validateUserName($url,$userRepository){

        $html = file_get_contents($url);
        $crawler = new Crawler($html);

        $crawler = $crawler->filter('a')->eq(12);

        $userAuxi = $crawler->attr('href');

//        dd('ValidateUsersUri >> validateUserName');
        $userAuxi = $this->formatName($userAuxi);

//        dd($userAuxi);
//        dd('ValidateUsersUri >> validateUserName',$userAuxi,$userRepository);

        if($userAuxi == $userRepository)
            return true;
        else
            return false;
    }

    public function formatName($name){
        return substr($name,24,100);
    }

    private function getHTML($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}