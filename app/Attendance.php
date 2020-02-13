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

    public static function filterAttendances($name,$sortBy,$orderBy)
    {
        $attendancesFiltered = DB::table('attendances')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->select('users.name','attendances.user_id', 'users.group','attendances.id','attendances.attendance_type','attendances.comment','attendances.created_at')
            ->where('users.name',$name)
            ->orderBy($sortBy, $orderBy)
            ->get();

        return $attendancesFiltered;
    }

    public static function getAttendanceIndicators($id)
    {
        $countA = 0;
        $countRJ = 0;
        $countRNJ = 0;
        $countFJ = 0;
        $countFNJ = 0;
        $total = 0;

        $attendancesbyUser = DB::table('attendances')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->select('attendances.id', 'attendances.attendance_type')
            ->where('users.id', $id)
            ->get();

        foreach ($attendancesbyUser as $attendance)
        {
            if ($attendance->attendance_type == 'A') $countA ++;
            if ($attendance->attendance_type == 'RJ') $countRJ++;
            if ($attendance->attendance_type == 'RNJ') $countRNJ++;
            if ($attendance->attendance_type == 'FJ') $countFJ++;
            if ($attendance->attendance_type == 'FNJ') $countFNJ++;  
        }
        $total = $countA + $countRJ + $countRNJ + $countFJ + $countFNJ;
        $countA = ($countA/$total)*100;
        $countA= round($countA, 1);
        $countRJ = ($countRJ/$total)*100;
        $countRJ = round($countRJ, 1);
        $countRNJ = ($countRNJ/$total)*100;
        $countRNJ = round($countRNJ, 1);
        $countFJ = ($countFJ/$total)*100;
        $countFJ = round($countFJ, 1);
        $countFNJ = ($countFNJ/$total)*100;
        $countFNJ = round($countFNJ, 1);
        
        $userIndicators= array([$countA, $countRJ, $countRNJ, $countFJ, $countFNJ, $total ]);

        return $userIndicators;
    }

}
