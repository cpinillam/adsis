<?php

namespace App\Http\Controllers;

use App\CourseCatalog;
use Illuminate\Http\Request;

class CourseCatalogController extends Controller
{
    
    public function index()
    { 
        $courseCatalog = CourseCatalog::all();
        return view('/Course.catalog', ['coursecatalog' => $courseCatalog]);
        
    }

    public function create()
    {
        $courseCatalog = new CourseCatalog();
        return view('/Course.create_catalogcourse', ['coursecatalog' => $courseCatalog]);
    }

    public function store(Request $request)
    {
        CourseCatalog::create($request->all());
        return redirect('/courseCatalog');
    }

    public function show(CourseCatalog $courseCatalog)
    {
        //
    }

    public function edit(CourseCatalog $courseCatalog)
    {
        return view('/Course.update_catalogcourse',  ['coursecatalog' => $courseCatalog]);
    }

    public function update(Request $request, CourseCatalog $courseCatalog)
    {
        $data = $request->all();
        $courseCatalog = CourseCatalog::find($courseCatalog->id);
        $courseCatalog->fill($data);
        $courseCatalog->save();
        return redirect('/courseCatalog');
    }

    public function destroy(CourseCatalog $courseCatalog)
    {
        //
    }
}
