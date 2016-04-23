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

class ValidateUsers
{
    public function validate($repository_id, $user)
    {
//        dd('ValidateUsers >> validate',$repository_id,$user);
        $validator = null;

        if ($repository_id == 1) {
            $validator = new ValidateUsersSpoj();
        } elseif ($repository_id == 2) {
            $validator = new ValidateUsersUri();
        } elseif ($repository_id == 3) {
            $validator = new ValidateUsersUva();
        } else $validator = null;

        if (!empty($validator)) {
            return $validator->validateUser($user);
        } else
            return false;
    }
}