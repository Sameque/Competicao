<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRepository extends Model
{

    protected $table = 'user_repositories';

    public function repository()
    {
        return $this->belongsTo('App\Repository');
    }


    public function problemSolvedUser()
    {
        return $this->hasMany('App\ProblemSolvedUser');
    }


    public function problemUnsolvedUser()
    {
        return $this->hasMany('App\ProblemUnsolvedUser');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'id',
        'repository_id',
        'username',
        'user_id',
        'name',
        'created_at',
        'updated_at',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}