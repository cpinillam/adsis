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
        $evaluationLimit = $course->weeks;
        if ($this->initialize == true)
        {
            Event::createEventTypeCourse($course);
            Evaluation::initializeEvaluationTheory($course, $evaluationLimit);
            Evaluation::initializeEvaluationPractice($course, $evaluationLimit);
            $this->initialize = false;
        }
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
