<?php

namespace App\Http\Controllers;

use App\CourseCatalog;
use Illuminate\Http\Request;

class CourseCatalogController extends Controller
{
    
    public function index()
    { {
            $courseCatalog = CourseCatalog::all();
            return view('/Course.catalog', ['coursecatalog' => $courseCatalog]);
        }
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseCatalog $courseCatalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit(CourseCatalog $courseCatalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, CourseCatalog $courseCatalog)
    {
        //
    }

    
    public function destroy(CourseCatalog $courseCatalog)
    {
        //
    }
}
