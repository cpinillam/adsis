<?php

namespace App\Observers;

use App\Evaluation;
use App\Event;
use App\Review;

class EvaluationObserver
{
    
    public function created(Evaluation $evaluation)
    {
       $review= new Review();
       $review->create($evaluation);
    }

    
    public function updated(Evaluation $evaluation)
    {
        //
    }

    
    public function deleted(Evaluation $evaluation)
    {
        //
    }

    
    public function restored(Evaluation $evaluation)
    {
        //
    }

   
    public function forceDeleted(Evaluation $evaluation)
    {
        //
    }
}
