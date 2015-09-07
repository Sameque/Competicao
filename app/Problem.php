<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table = 'problems';

    protected $fillable = [
        'id',
        'name',
        'code',
        'repository_id',
        'competition_id',
        'url',
        'dificult',
    ];

    protected $hidden = [
//        'id',
//        'name',
//        'code',
//        'repository_id',
//        'competition_id',
//        'url',
//        'dificult',
    ];

    public function repository()
    {
        return $this->belongsTo('App\Repository');
    }

}
