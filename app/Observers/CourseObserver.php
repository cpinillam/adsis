<?php

namespace App\Observers;

use App\Course;
use App\Evaluation;
use App\Event;

class CourseObserver
{
   
    public function created(Course $course)
    {
        $evaluationLimit = $course->weeks;
        Event::createEventTypeCourse($course);
        Evaluation::initializeEvaluationTheory($course, $evaluationLimit);
        Evaluation::initializeEvaluationPractice($course, $evaluationLimit);

    }
    
    public function updated(Course $course)
    {
        $evaluationLimit = $course->weeks;
        Evaluation::initializeEvaluationTheory($course, $evaluationLimit);
        Evaluation::initializeEvaluationPractice($course, $evaluationLimit);
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
