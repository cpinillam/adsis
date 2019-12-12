<?php

namespace App\Observers;

use App\Evaluation;

class EvaluationObserver
{
    /**
     * Handle the evaluation "created" event.
     *
     * @param  \App\Evaluation  $evaluation
     * @return void
     */
    public function created(Evaluation $evaluation)
    {
    
    }

    /**
     * Handle the evaluation "updated" event.
     *
     * @param  \App\Evaluation  $evaluation
     * @return void
     */
    public function updated(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the evaluation "deleted" event.
     *
     * @param  \App\Evaluation  $evaluation
     * @return void
     */
    public function deleted(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the evaluation "restored" event.
     *
     * @param  \App\Evaluation  $evaluation
     * @return void
     */
    public function restored(Evaluation $evaluation)
    {
        //
    }

    /**
     * Handle the evaluation "force deleted" event.
     *
     * @param  \App\Evaluation  $evaluation
     * @return void
     */
    public function forceDeleted(Evaluation $evaluation)
    {
        //
    }
}
