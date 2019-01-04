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


class ValidateUsersSpoj
{
    public function validateUser($username)
    {
        $urlValidate = URL_USER_SPOJ_VALIDATE.$username.'/';

        if($this->getHTML($urlValidate) != '200' ){
            return false;
        } else {
            return $this->validateUserName($urlValidate,$username);
        }
    }

    private function validateUserName($url,$userRepository){

        $html = file_get_contents($url);
        $crawler = new Crawler($html);

        $crawler = $crawler->filter('body > div > div > div > div > div > div > div h4')->eq(0);

        $userAuxi = '';

        foreach ($crawler as $domElement) {
            $userAuxi = $this->formatName($domElement->nodeValue);
        }

        if($userAuxi == $userRepository)
            return true;
        else
            return false;
    }

    public function formatName($name){
        return substr($name,1,strlen($name)-1);
    }

    private function getHTML($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}