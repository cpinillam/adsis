<?php

namespace App\Observers;

use App\Evaluation;
use App\Event;
use App\Review;

class EvaluationObserver
{
    
    public function created(Evaluation $evaluation)
    {
       $evaluationArray =  (array) $evaluation;
       $evaluationArray['evaluation_id'] = $evaluation->id;
       unset($evaluationArray['id']);
       Review::create($evaluationArray);
       if ($evaluation->scope == 'Teoría'){
        Event::createEventTypeTheory($evaluation);
        return true;
       }
       Event::createEventTypePractice($evaluation);
       return true;
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
