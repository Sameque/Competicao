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

class ValidateUsers
{
    public function validate($user)
    {
        $validator = null;
        $validated = false;

        if ($user->repository_id == 1) {
            $validate = new ValidateUsersSpoj();
        } elseif ($user->repository_id == 2) {
            $validate = new ValidateUsersUri();
        } elseif ($user->repository_id == 3) {
            $validate = new ValidateUsersUva();
        } else $validate = null;

        if ($validate) {
            $validated = $validate->validateUser($user);
        }else
//            dd("merda");
        return $validated;
    }
}