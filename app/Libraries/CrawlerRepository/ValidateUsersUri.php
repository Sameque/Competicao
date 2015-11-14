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

class ValidateUsersUri
{
    public function validate($user)
    {
        if($user->repository_id = 1){
            return 'Spoj';
        }elseif ($user->repository_id = 2){
            return 'Uri';
        }elseif ($user->repository_id = 3){
            return 'Uva';
        }else return 'Fudeu';
    }
}