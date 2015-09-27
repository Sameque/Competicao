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

class ValidateRepository
{
//    private $url = '';
//    private $validated = false;

    public function validate($url)
    {
        if ($this->getUrl($url) != '200')
            return false;
        else
            return true;
    }

    function getUrl($url)
    {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}