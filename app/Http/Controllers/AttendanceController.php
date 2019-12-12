<?php

namespace App\Http\Controllers;

use App\User;
use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LengthException;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::all(); 
        return view('/Attendance.attendance', ['attendance' => $attendance]);
    }

    public function create()
    {
        $attendance = new Attendance();
        $user = new User;
        $user = $user->getUsersByGroup(1);
        $attendance->tutor_id = Auth::id();
        //$tutor = $attendance->user->name;
        $tutor = Auth::user()->name;
        $attendance->timestamps = date('Y-m-d H:i:s');
        return view('/Attendance.create', ['user' => $user, 'attendance' => $attendance, 'tutor'=>$tutor]);
    }

    public function store(Request $request)
    {
        $data = $request->toArray();
        $token = array_shift($data);
        //dd($data);
        $end= count($data);
        for($i=$end; $i>=5; $i-=5)
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
        return redirect('/attendance');
    }
    
    public function show(Attendance $attendance)
    {
        //
    }

    public function edit(Attendance $attendance)
    {
        return view('/Attendance.update',  ['attendance' => $attendance]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->all();
        $attendance = Attendance::find($attendance->id);
        $attendance->fill($data);
        $attendance->save();
        return redirect ('/attendance');
    }

    public function destroy(Attendance $attendance)
    {
        //
    }
}
