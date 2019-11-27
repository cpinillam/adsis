<?php

namespace App\Http\Controllers;

use App\SelfEvaluation;
use Illuminate\Http\Request;

class SelfEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SelfEvaluation  $selfEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(SelfEvaluation $selfEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SelfEvaluation  $selfEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(SelfEvaluation $selfEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SelfEvaluation  $selfEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SelfEvaluation $selfEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SelfEvaluation  $selfEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelfEvaluation $selfEvaluation)
    {
        //
    }
    public function skillSelfEvaluation()
    {
        $skill= " ";
        return $skill;
    }

}
