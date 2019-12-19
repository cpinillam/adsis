<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\DB;

class Attendance extends Model
{
    protected $fillable = [
        'user_id','attendance_type', 'comment', 'tutor_id', 'timestamps'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');

    }

    public static function storeMultiple($data)
    {
        $end=count($data);
        $numberOfInputs=5;
        for($i=$end; $i>=$numberOfInputs; $i-=$numberOfInputs)
        {      
            $attend = new Attendance;
            $attend->user_id = array_shift($data);
            $attend->attendance_type = array_shift($data);
            $attend->comment = array_shift($data);
            $attend->tutor_id = array_shift($data);
            $attend->timestamps = array_shift($data);
            $attend = $attend->toArray();
            Attendance::create($attend);
        }
        return true;
    }

    public static function filterAttendances($name,$sortBy,$orderBy,$perPage)
    {
        $attendancesFiltered = DB::table('attendances')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->select('users.name', 'users.group','attendances.id','attendances.attendance_type','attendances.comment','attendances.created_at')
            ->where('users.name',$name)
            ->orderBy($sortBy, $orderBy)
            ->get();
            // ->paginate($perPage);

        return $attendancesFiltered;
    }


    
}
