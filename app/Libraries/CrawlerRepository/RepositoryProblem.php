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

    public static function getRepositoryProblem($repositoryName,$problems,$username=null)
    {
        if ($repositoryName == 'Spoj') {
            $repository = new RepositoryProblemSpoj();
        } elseif ($repositoryName == 'Uri') {
            $repository = new RepositoryProblemUri();
        } elseif ($repositoryName == 'Uva') {
            $repository = new RepositoryProblemUva();
        } else $repository = null;

        if (!empty($repository)) {
            return $repository->getProblem($problems,$username);
        } else
            return false;
    }
}