<?php

/**
 * Created by PhpStorm.
 * User: Sameque
 * Date: 13/09/2015
 * Time: 17:06
 */

namespace App\Libraries\CrawlerRepository;

use App\Libraries\CrawlerRepository\ValidateProblemUri;
use App\Libraries\CrawlerRepository\ValidateProblemUva;
use App\Libraries\CrawlerRepository\ValidateProblemSpoj;


class ValidateProblem
{
    public function validate($repository_id, $problem)
    {
        $validator = null;

        if ($repository_id == 1) {
            $validator = new ValidateProblemSpoj();
        } elseif ($repository_id == 2) {
            $validator = new ValidateProblemUri();
        } elseif ($repository_id == 3) {
            $validator = new ValidateProblemUva();
        } else $validator = null;

        if (!empty($validator)) {
            return $validator->validationProblem($problem);
        } else
            return false;
    }
}