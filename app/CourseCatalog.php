<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class CourseCatalog extends Model
{
    public function Course()
    {
        return $this->hasMany('App\Course');
    }
}
