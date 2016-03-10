<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemCompetition extends Model
{
    protected $fillable = [
        'id',
//        'competition_id',
//        'user_id'
    ];

    protected $hidden = [
        'id'
    ];
}
