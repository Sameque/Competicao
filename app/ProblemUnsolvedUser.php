<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemUnsolvedUser extends Model
{
    protected $table = 'problem_unsolved_users';

    public function userRepository()
    {
        return $this->belongsTo('App\UserRepository');
    }

    protected $fillable = [
        'id',
        'problem',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];
}