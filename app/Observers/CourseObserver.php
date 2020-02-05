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
        $evaluationT= new Evaluation();
        $scope = 'T'; 
        $evaluationT->InitializeEvaluation($course, $scope);
        $evaluationP = new Evaluation();
        $scope = 'P'; 
        $evaluationP->InitializeEvaluation($course, $scope); 
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
