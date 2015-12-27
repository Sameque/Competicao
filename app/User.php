<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    
    protected $table = 'users';

    public function userRepository()
    {
        return $this->hasMany('App\UserRepository');
    }

//    public function competition()
//    {
//        return $this->hasMany('App\Competition');
//    }

    public function competitions()
    {
        return $this->belongsToMany('App\Competition');
    }
    protected $fillable = [
//        'id',
        'name',
        'username',
        'email',
//        'accessLevel',
        'password',
        'cpf',
        'rg',
        'yearCourse',
//        'birthDate',
        'graduated'
    ];

    protected $hidden = [
//        'id',
        'accessLevel',
//        'password',
//        'cpf',
//        'rg',
//        'passwordConf',
        'birthDate',
        'updated_at',
        'created_at',
        'remember_token',
//        'pivot'
    ];
}