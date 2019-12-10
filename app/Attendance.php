<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\ForeignKeyDefinition;

class Attendance extends Model
{
    protected $fillable = [
        'attendance_type', 'comment', 'tutor_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
