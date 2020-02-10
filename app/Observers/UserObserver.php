<?php

namespace App\Observers;

use App\User;
use App\Evaluation;


class UserObserver
{
    
    public function created(User $user)
    {

    }

    
    public function updated(User $user)
    {
       //
    }

   
    public function deleted(User $user)
    {
        //
    }

    public function restored(User $user)
    {
        //
    }

    
    public function forceDeleted(User $user)
    {
        //
    }
}
