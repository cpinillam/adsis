<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    public $eventTypeCourse = 1;
    public $eventTypeEvaluation = 2;
    public $eventEvaluationScopeTheory = 'Teoría';
    public $eventEvaluationScopePractice = 'Práctica';

    protected  $fillable = ['user_id', 'event_id', 'event_type', 'event_date', 'event_scope'];

    public function createEventTypeCourse($course)
    {
        Event::create([
           'user_id' => $course['user_id'],
           'event_id' => $course['id'],
           'event_type' => $this->eventTypeCourse,
           'event_date' => $course->CourseCatalog->start_date,
           'event_scope' => $course->CourseCatalog->name
        ]);
    }

    public  function createEventTypeEvaluation($evaluation, $scope)
    {
        if ($scope == 'T')
        {
            Event::create([
                'user_id' => $evaluation['user_id'],
                'event_id' => $evaluation['id'],
                'event_type' => $this->eventTypeEvaluation,
                'event_date' => $evaluation->created_at,
                'event_scope' => $this->eventEvaluationScopeTheory
                ]);
        } else {
            Event::create([
                'user_id' => $evaluation['user_id'],
                'event_id' => $evaluation['id'],
                'event_type' => $this->eventTypeEvaluation,
                'event_date' => $evaluation->created_at,
                'event_scope' => $this->eventEvaluationScopePractice
            ]);
        }
        
    }

    public  function showEventsByUser($user)
    {
        $eventsByUser = Event::all()->where('user_id', $user);
        return $eventsByUser;
    }

}
