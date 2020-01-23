<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class CourseCatalog extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date', 'weeks'];
    
    public function Course()
    {
        return $this->hasMany('App\Course');
    }

    public function GetAllCatalog()
    {
        $allCourses = CourseCatalog::all();
        return $allCourses;
    }
}
