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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'id',
        'repository_id',
        'username',
        'user_id',
        'created_at',
        'updated_at',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}