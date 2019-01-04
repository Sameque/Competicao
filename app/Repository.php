<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $table = 'repositorys';



    public function userRepository()
    {
        return $this->hasMany('App\UserRepository');
    }

    protected $fillable = [
        'id',
        'name',
        'url'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
