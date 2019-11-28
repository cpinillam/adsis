<?php

namespace App\Http\Controllers;

use App\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{

    public function index()
    {
        $evaluation = Evaluation::all();
        //dd ($evaluation);
        return view('/Evaluation.evaluation', ['evaluations' => $evaluation]);
    }

    public function create()
    {
        $evaluation = new Evaluation();
        $evaluation->user_id = Auth::id();
        return view ('/Evaluation.create', ['evaluation' => $evaluation]);
        dd($evaluation);
    }
    
    public function store(Request $request)
    {
        Evaluation::create($request->all());
        $userid=Auth::id();
        dd($userid);
        return redirect ('/Evaluation.create', ['userid'=> $userid] );
    }

    
    public function show(Evaluation $evaluation)
    {
        //
    }

   
    public function edit(Evaluation $evaluation)
    {
        //
    }

    
    public function update(Request $request, Evaluation $evaluation)
    {
        $data = $request->all();
        $evaluation = Evaluation::find($id);
        $evaluation->fill($data);
        $evaluation->save();
        //return view('layouts.sent',  ['kata' => $kata]);
    }

   
    public function destroy(Evaluation $evaluation)
    {
        //
    }
    public function skillSelfEvaluation()
    {
        $skill= 1;
        return $skill;
    }

}
