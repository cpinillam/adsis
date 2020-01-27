<?php

namespace App\Observers;

use App\Course;
use App\Event;

class CourseObserver
{
   
    public function created(Course $course)
    {
        $newEvent = new Event();
        $newEvent->createEventTypeCourse($course);
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
