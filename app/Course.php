<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CourseCatalog;

class Course extends Model
{
    public function GetAllCourses(){
        $allCourses = Course::all();
        return $allCourses;
    }

    public function GetCoursesByUserId(int $user_id)
    {
        $Courses = $this->GetAllCourses()->where('user_id', $user_id);
        return $Courses;

    }

    public function CourseCatalog()
    {
        return $this->belongsTo(CourseCatalog::class, 'course_id_catalog' );
    }
}
