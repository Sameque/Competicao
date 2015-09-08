<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = 'competitions';

    public function problems()
    {
        return $this->hasMany('App\Problem');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    protected $fillable = [
        'id',
        'name',
        'dateBegin',
        'hoursBegin',
        'dateEnd',
        'hoursEnd',
    ];

    protected $hidden = [
//        'id',
//        'dateBegin',
//        'hoursBegin',
//        'dateEnd',
//        'hourEnd',
//        'created_at',
//        'updated_at'
    ];
}
