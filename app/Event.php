<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    public $eventTypeCourse = 1;
    public $eventTypeEvaluation = 2;
    public $eventEvaluationScopeT ='Teoría';
    public $eventEvaluationScopeP = 'Práctica';

    protected  $fillable = ['user_id', 'event_id', 'event_type', 'event_date'];

    public function createEventTypeCourse($course)
    {
        Event::create([
           'user_id' => $course['user_id'],
           'event_id' => $course['id_course'],
           'event_type' => $this->eventTypeCourse,
           'event_date' => $course->CourseCatalog->start_date,
        ]);
    }

    public  function createEventTypeEvaluationTheory($evaluation)
    {
        Event::create([
            'user_id' => $evaluation['user_id'],
            'event_id' => $evaluation['id'],
            'event_type' => $this->eventTypeEvaluation,
            'event_date' => $evaluation->created_at,
            'event_scope' => $this->eventEvaluationScopeT
        ]);
    }

    public  function createEventTypeEvaluationPractice($evaluation)
    {
        Event::create([
            'user_id' => $evaluation['user_id'],
            'event_id' => $evaluation['id'],
            'event_type' => $this->eventTypeEvaluation,
            'event_date' => $evaluation->created_at,
            'event_scope' => $this->eventEvaluationScopeP
        ]);
    }

    public  function showEventsByUser($user){

        $eventsByUser = Event::all()->where('user_id', $user);

        return $eventsByUser;
    }

}
