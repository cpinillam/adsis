<?php

namespace App\Http\Controllers;

use App\User;
use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $tutor = $attendance->user->name;
        $tutor = Auth::user()->name;
        $attendance->timestamps = date('Y-m-d H:i:s');
        return view('/Attendance.create', ['users' => $user, 'attendance' => $attendance, 'tutor'=>$tutor]);
    }

    public function store(Request $request)
    {
        Attendance::create($request->all());
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
