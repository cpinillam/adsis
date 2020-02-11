<?php

namespace App\Observers;

use App\Course;
use App\Evaluation;
use App\Event;

class CourseObserver
{
    public $initialCourse = true; //

    
    
    public function created(Course $course)
    {
        Event::createEventTypeCourse($course);
        Evaluation::initializeEvaluationTheory($course);
        Evaluation::initializeEvaluationPractice($course);
        $this->initialCourse = false;

        /* $evaluationLimit = $course->weeks;
        if ($this->initialCourse == true)
        {
            
        } */
    }
    
    public function updated(Course $course)
    {
       
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
