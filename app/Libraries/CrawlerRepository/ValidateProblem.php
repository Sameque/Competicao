<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

namespace App\Libraries\CrawlerRepository;


class ValidateProblem
{
    public function validate($repository_id, $problem)
    {
        $validator = null;

        if ($repository_id == 1) {
            $repository = new ValidateProblemSpoj();
        } elseif ($repository_id == 2) {
            $repository = new ValidateProblemUri();
        } elseif ($repository_id == 3) {
            $repository = new ValidateProblemUva();
        } else $repository = null;

        if (!empty($repository)) {
            return $repository->validationProblem($problem);
        } else
            return false;
    }
}