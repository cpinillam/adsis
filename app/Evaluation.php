<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evaluation extends Model
{
    protected $fillable = ['language', 'attitude', 'participation', 'learning', 'collaboration', 'meteo', 'user_id'];

    public function GetAllEvaluations(){
        $allEvaluations = Evaluation::all();
        return $allEvaluations;
    }

    public function GetEvaluationByUserId(int $user_id)
    {
        $Evaluation = $this->GetAllEvaluations()->where('user_id', $user_id);
        return $Evaluation;

    }


    public function user()
{
    return $this->hasOne(User::class);
}


protected function EvaluationsByUser($user)
{
        $evaluations = DB::table('evaluations')
            ->where('user_id','=', $user)
            ->Orderby ('created_at')
            ->get();
        return $evaluations;
}


}
