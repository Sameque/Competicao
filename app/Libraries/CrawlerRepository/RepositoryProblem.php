<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

namespace App\Libraries\CrawlerRepository;

//use App\Libraries\CrawlerRepository\RepositoryUserSpoj;
//use App\Libraries\CrawlerRepository\RepositoryUserUri;
//use App\Libraries\CrawlerRepository\RepositoryUserUva;

class RepositoryProblem
{

    public static function getRepositoryProblem($repository_id,$username)
    {
        if ($repository_id == 1) {
            $validator = new RepositoryUserSpoj();
        } elseif ($repository_id == 2) {
            $validator = new RepositoryUserUri();
        } elseif ($repository_id == 3) {
            $validator = new RepositoryUserUva();
        } else $validator = null;

        if (!empty($validator)) {
            return $validator->getUserRepository($username);
        } else
            return false;
    }
}