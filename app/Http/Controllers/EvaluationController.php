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
        return view('/Evaluation.evaluation', ['evaluations' => $evaluation]);
    }

    public function create()
    {
        $evaluation = new Evaluation();
       // $evaluation->user_id = Auth::id();
        return view ('/Evaluation.create', ['evaluation' => $evaluation]);
    }

    public function store(Request $request)
    {

        Evaluation::create($request->all());
        return redirect ('/evaluation');
    }

    public function show(Evaluation $evaluation)

    {

    }

    public function edit(Evaluation $evaluation)
    {
        return view('/Evaluation.update',  ['evaluation' => $evaluation]);
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        $data = $request->all();
        $evaluation = Evaluation::find($evaluation->id);
        $evaluation->fill($data);
        $evaluation->save();
        return redirect ('/evaluation');
    }

    public function destroy(Evaluation $evaluation)
    {
        //
    }

    public function getEvaluationsbyUser()
    {
        $user= Auth::id();
        $evaluations = Evaluation::EvaluationsByUser($user);
        return view('/Evaluation.evaluation', ['evaluations' => $evaluations]);
    }

}
