<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\CourseCatalog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();
        $user= new User();
        $user= $user->GetAllUsers()->where('rol', 2); //Student role
        //$user = $user->toArray();
        
        return view('/Course.course', ['course' => $course]);
    }

    public function create()
    {
        $courseCatalog= new CourseCatalog();
        $course = new Course();
        $courseCatalog = $courseCatalog->GetAllCatalog();
        $user = new User;
        $user = $user->GetAllUsers()->where('rol', 2); //Student role
        $tutor = Auth::user()->name;
        return view('/Course.assign', ['user' => $user, 'coursecatalog' => $courseCatalog, 'course' => $course, 'tutor' => $tutor]);
    }

    public function store(Request $request)
    {
        $data = $request->toArray();
        $token = array_shift($data); //not used
        Course::assignMultipleUsers($data);
        return redirect('/course');
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
