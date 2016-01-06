<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

namespace App\Libraries\CrawlerRepository;

class RepositoryProblem
{

    public static function getRepositoryProblem($repository_id,$problem,$username=null)
    {
        if ($repository_id == 1) {
            $repository = new RepositoryProblemSpoj();
        } elseif ($repository_id == 2) {
            $repository = new RepositoryProblemUri();
        } elseif ($repository_id == 3) {
            $repository = new RepositoryProblemUva();
        } else $repository = null;

        if (!empty($repository)) {
            return $repository->getProblem($problem,$username);
        } else
            return false;
    }
}