<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    protected  $fillable = ['user_id', 'event_id', 'event_type', 'event_date', 'event_scope'];

    public static function createEventTypeCourse($course)
    {
        Event::create([
           'user_id' => $course['user_id'],
           'event_id' => $course['id'],
           'event_type' => 1, // eventTypeCourse = 1
           'event_date' => $course->courseCatalog->start_date,
           'event_scope' => $course->courseCatalog->name
        ]);
    }

    public static function createEventTypeTheory(Evaluation $evaluation)
    {
        Event::create([
            'user_id' => $evaluation['user_id'],
            'event_id' => $evaluation['id'],
            'event_type' => 2, // eventTypeEvaluation = 2
            'event_date' => $evaluation->created_at,
            'event_scope' => 'Teoría'
        ]);
    }

    public static function createEventTypePractice(Evaluation $evaluation)
    {
        Event::create([
                'user_id' => $evaluation['user_id'],
                'event_id' => $evaluation['id'],
                'event_type' => 2,// eventTypeEvaluation = 2
                'event_date' => $evaluation->created_at,
                'event_scope' => 'Práctica'
            ]);
    }     

    public  function showEventsByUser($user)
    {
        $eventsByUser = Event::all()->where('user_id', $user);
        return $eventsByUser;
    }

}
