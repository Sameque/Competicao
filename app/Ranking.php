<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    public function problemSolveds()
    {
        return $this->hasMany('App\ProblemSolved');
    }

    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'id',
        'competition_id',
        'user_id'
    ];

    protected $hidden = [
        'id'
    ];
}
