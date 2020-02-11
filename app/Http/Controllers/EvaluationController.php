<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\User;
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
        $evaluation->user_id = Auth::id();
        //$evaluation->user_id = $userid;
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
        //dd($evaluations);
        return view('/Evaluation.evaluation', ['evaluations' => $evaluations]);
    }

    public function avgEvaluationsbyUser()
    {
        $user = Auth::id();
        $avgEval = Evaluation::AvgEvaluations($user);
        //dd($avgEval);
        return view('/users.indicators', ['evaluation' => $avgEval]);
    }

    public function getFilters(Request $request)
    {
        $user = new User;
        $users = $user->getAllUsers();
        return view('/Evaluation.filter', ['user' => $users]);
    }

    public function applyfilters(Request $request)
    {
        if ($request->has('sortBy')) {
            if ($request->sortBy == 'grupo') $sortBy = 'group';
            if ($request->sortBy == 'fecha') $sortBy = 'updated_at';
            if ($request->sortBy == 'curso') $sortBy = 'course';
        };
        if ($request->has('orderBy')) $orderBy = $request->orderBy;
        if ($request->has('name')) $name = $request->name;

        $evaluationsFiltered = Evaluation::filterEvaluations($name, $sortBy, $orderBy);

        return view('/Evaluation.filtered',  ['evaluations' => $evaluationsFiltered]);
    }

}
