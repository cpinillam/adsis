<?php

namespace App\Observers;

use App\Course;
use App\Evaluation;
use App\Event;

class CourseObserver
{
   
    public function created(Course $course)
    {
        $newEventC = new Event();
        $newEventC->createEventTypeCourse($course);

    }

    
    public function updated(Course $course)
    {
        //
    }

   
    public function deleted(Course $course)
    {
        //
    }

   
    public function restored(Course $course)
    {
        //
    }

    
    public function forceDeleted(Course $course)
    {
        //
    }
}
