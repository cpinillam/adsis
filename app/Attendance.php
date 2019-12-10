<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\ForeignKeyDefinition;

class Attendance extends Model
{

    public function user()
    {
        return $this->hasOne('App\User');
    }

}
