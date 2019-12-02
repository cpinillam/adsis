<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evaluation extends Model
{
protected $fillable = ['language', 'attitude', 'participation', 'learning', 'collaboration', 'meteo', 'user_id', 'review_status'];


protected function skillSelfEvaluation()
    {
        $skill= 2;
        return $skill;
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