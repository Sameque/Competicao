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

class ValidateUsersSpoj
{
    private $url = 'http://br.spoj.com/users/';

    public function validateUser($userRepository)
    {
        $urlValidate = $this->url.$userRepository->username.'/';

        if($this->getUrl($urlValidate) != '200' ){
            return false;
        } else
            return true;
    }

    private function getUrl($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}