<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

//namespace App\CrawleRepository;
namespace App;

use App\CrawlerRepository\ValidateUsersSpoj;
use App\CrawlerRepository\ValidateUsersUri;

class ValidateUsers
{
    public function validate($user)
    {
        $validate = null;

        if($user->repository_id = 1){
            $validate = new ValidateUsersSpoj();
        }elseif ($user->repository_id = 2){
            $validate = new ValidateUsersUri();
        }elseif ($user->repository_id = 3){
            $validate = new ValidateUsersSpoj();
        }else return null;


    }
}