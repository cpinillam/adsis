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
        $user = $user->getUsersByGroup(2); //TO  DO group selector at view
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
        Attendance::storeMultiple($data);
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

    public function getFilters(Request $request)
    {
        $user = new User;
        $users = $user->getAllUsers();
        return view('/Attendance.filter', ['user' => $users]);
    }

    public function applyfilters(Request $request)
    {
    if ($request->has('sortBy'))
        {
        if ($request->sortBy=='grupo') $sortBy='group';
        if ($request->sortBy =='fecha') $sortBy = 'created_at';
        if ($request->sortBy == 'curso') $sortBy = 'course';
         };
    if ($request->has('orderBy')) $orderBy = $request->orderBy;
    if ($request->has('perPage')) $perPage = $request->perPage;
    if ($request->has('name')) $name = $request->name;

    $attendancesF= Attendance::filterAttendances($name, $sortBy, $orderBy, $perPage);
    $userid= $attendancesF[0]->user_id;
    $indicators = Attendance::getAttendanceIndicators($userid);
    
    return view('/Attendance.filtered',  ['attendance' => $attendancesF, 'indicators' => $indicators]);
    }

    public function getUserAttendanceIndicators()
    {
        // $AttendanceIndicators= Attendance::getAttendanceIndicators($userid);
        // return $AttendanceIndicators;
        return view('/users.indicators');
    }
    


}
