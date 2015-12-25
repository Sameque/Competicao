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

class RepositoryUser
{

    public static function getRepositoryUser($userRepository)
    {
        if ($userRepository->repository_id == 1) {
            $validator = new RepositoryUserSpoj();
        } elseif ($userRepository->repository_id == 2) {
            $validator = new RepositoryUserUri();
        } elseif ($userRepository->repository_id == 3) {
            $validator = new RepositoryUserUva();
        } else $validator = null;

        if (!empty($validator)) {
            return $validator->getUserRepository($userRepository);
        } else
            return false;
    }
}