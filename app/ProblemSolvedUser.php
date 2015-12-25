<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemSolvedUser extends Model
{
    protected $table = 'problem_solved_users';

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
