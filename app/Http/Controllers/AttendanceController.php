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

    /* public function filterAttendances(Request $request)
    {
    //dd($request);
    $sortBy = 'id';
    $orderBy = 'ASC';
    $perPage = 20;
    $name = '1';
    $attendance = new Attendance;
    $user = new User;
    $user = $user->getUsersByGroup(1);
    $attendance->tutor_id = Auth::id();
    $tutor = Auth::user()->name; 

    if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
    if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
    if ($request->has('perPage')) $perPage = $request->query('perPage');
    if ($request->has('name')) $name = $request->query('name');

    $attendance= Attendance::find($name)->orderBy($sortBy, $orderBy)->paginate($perPage);
    return view('/Attendance.filter',['attendance'=>$attendance,'sortBy'=>$sortBy,'orderBy'=>$orderBy,'name'=>$name,'perPage'=>$perPage]);
    } */

    public function filterbyName(Request $request)
    {
        view ('/Attendance.filter');
        $name = $request->input('name');
        $name = "nellay";
        //dd($name);
        $attendance = Attendance::getAttendancesByUserName($name);
        //dd($attendance);
        return view('/Attendance.byname', ['attendance' => $attendance]);
    }

}
