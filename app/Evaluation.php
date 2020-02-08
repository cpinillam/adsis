<?php

namespace App;

use Highlight\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Evaluation extends Model
{
    
    protected $fillable = ['language', 'attitude', 'workflow', 'learning', 'meteo', 'scope', 'course_id', 'user_id', 'filled'];

    public static function initializeEvaluationTheory(Course $course)
    {
        $evaluationT = new Evaluation();
        $scope = 'Theory';
        $evaluationT->InitializeEvaluation($course, $scope);
    }

    public static function initializeEvaluationPractice(Course $course)
    {
        $evaluationT = new Evaluation();
        $scope = 'Practice';
        $evaluationT->InitializeEvaluation($course, $scope);
    }

    public function InitializeEvaluation($course, $scope)
    {
        $this->course_id = $course['id'];
        $this->user_id = $course['user_id'];
        if ($scope == 'Theory') {
            $this->scope = $course->scopeTheory;
            $this->save();
        } else {
            $this->scope = $course->scopePractice;
            $this->save();
        }
        return true;
    }

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
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
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

    protected function GetEvaluationsNotFilled()
    {
        $evaluations = DB::table('evaluations')
            ->where('filled', '=', false)
            ->Orderby('created_at')
            ->get();
        return $evaluations;
    }

    public function courseCatalog()
    {
        return $this->hasOneThrough(
            'App\Course',
            'App\Evaluation',
            'course_id', // Foreign key on Evaluation table...
            'id_course_catalog', // Foreign key on Course table...
            'id', // Local key on Evaluation table...
            'id_course' // Local key on Course table...

        );
    }
}
