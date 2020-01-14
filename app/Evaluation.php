<?php

namespace App;

use Highlight\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Evaluation extends Model
{
    protected $fillable = ['language', 'attitude', 'participation', 'learning', 'collaboration', 'meteo', 'group', 'user_id'];


    public function GetAllEvaluations(){
        $allEvaluations = Evaluation::all();
        return $allEvaluations;
    }

    public function GetEvaluationByUserId(int $user_id)
    {
        $Evaluation = $this->GetAllEvaluations()->where('user_id', $user_id);
        return $Evaluation;

    }

    public function GetEvaluationData($evaluationId)
    {
        $evaluationData = Evaluation::find($evaluationId);
        return $evaluationData;
    }


    public function GetEvaluationUserId($evaluationId)
    {
        $evaluation = $this->GetEvaluationData($evaluationId);
        $evaluationUserId = $evaluation->user_id;
        return $evaluationUserId;
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

    public static function AvgEvaluations(int $user_id)
    {
        $avgEvaluations = new Evaluation();
        $avgEvaluations->user_id = $user_id;
        $avgLanguage = DB::table('evaluations')
            ->where('user_id', '=', $user_id)
            ->avg('language');
        $avgEvaluations->language = round($avgLanguage,1);
        $avgAttitude = DB::table('evaluations')
            ->where('user_id', '=', $user_id)
            ->avg('attitude');
        $avgEvaluations->attitude = round($avgAttitude,1);
        $avgParticipation = DB::table('evaluations')
            ->where('user_id', '=', $user_id)
            ->avg('participation');
        $avgEvaluations->participation = round($avgParticipation,1);
        $avgLearning = DB::table('evaluations')
            ->where('user_id', '=', $user_id)
            ->avg('learning');
        $avgEvaluations->learning = round($avgLearning,1);

        return $avgEvaluations;
    }

}
