<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submission';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }

    protected $fillable = [
        'id',
        'date',
        'hours',
        'problem',
        'result',
        'language',
        'user_id',
        'competition_id',
        'problem_id',
        'updated_at',
        'created_at'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}
