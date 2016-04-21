<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = 'competitions';

    protected $dateFormat = 'd/m/Y';

    public function problems(){
        return $this->hasMany('App\Problem');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }


    public function setDateBeginAttribute($date)
    {
        $this->attributes['dateBegin'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    public function setDateEndAttribute($date)
    {
        $this->attributes['dateEnd'] = Carbon::createFromFormat('d/m/Y', $date);
    }


//    protected function getDateFormat()
//    {
//        dd($this);
//        return 'Y-m-d';
//    }
    protected $casts = [
        'dateBegin' => 'date',
        'dateEnd' => 'date',
    ];

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
        'created_at',
        'updated_at'
    ];
}
