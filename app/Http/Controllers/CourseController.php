<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        return view('/Course.course', ['course' => $course]);
    }

    
    public function create()
    {
        //
    }

    
   
    public function store(Request $request)
    {
        $data = $request->toArray();
        $token = array_shift($data);
        Course::storeMultiple($data);
        return redirect('/attendance');
    }
    
    public function show(Course $course)
    {
        //
    }

    
    public function edit(Course $course)
    {
        //
    }

    
    public function update(Request $request, Course $course)
    {
        //
    }

   
    public function destroy(Course $course)
    {
        //
    }
}
