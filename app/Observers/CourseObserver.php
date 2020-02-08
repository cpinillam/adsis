<?php

namespace App\Observers;

use App\Course;
use App\Evaluation;
use App\Event;

class CourseObserver
{
   
    public function created(Course $course)
    {
        
        Event::createEventTypeCourse($course);
        Evaluation::initializeEvaluationTheory($course);
        Evaluation::initializeEvaluationPractice($course);

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
