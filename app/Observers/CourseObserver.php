<?php

namespace App\Observers;

use App\Course;
use App\Evaluation;
use App\Event;

class CourseObserver
{
   
    public function created(Course $course)
    {
        $eventCourse = new Event();
        $eventCourse->createEventTypeCourse($course);
        $evaluationTheory = new Evaluation();
        $evaluationTheory->SetFirstCourseEvaluationTheory($course);
        $evaluationPractice = new Evaluation();
        $evaluationPractice->SetFirstCourseEvaluationPractice($course);
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
