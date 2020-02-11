<?php

namespace App;

use Highlight\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Evaluation extends Model
{
    public static $evaluationTheoryCounter = 0;
    public static $evaluationPracticeCounter = 0;

    protected $fillable = ['language', 'attitude', 'workflow', 'learning', 'meteo', 'scope', 'course_catalog_id', 'user_id', 'filled'];

    public static function filterEvaluations($name, $sortBy, $orderBy)
    {
        $evaluationsFiltered = DB::table('evaluations')
            ->join('users', 'users.id', '=', 'evaluations.user_id')
            //->join('course_catalogs', 'id', '=', 'evaluations.course_catalog_id')
            ->select('users.name', 'evaluations.id', 'evaluations.language', 'evaluations.attitude', 'evaluations.workflow', 'evaluations.learning', 'evaluations.meteo', 'evaluations.scope', 'evaluations.course_catalog_id', 'evaluations.updated_at')
            ->where('users.name', $name)
            ->orderBy($sortBy, $orderBy)
            ->get();
        return $evaluationsFiltered;
    }

    public static function initializeEvaluationTheory(Course $course, $evaluationLimit)
    {
    
        if (self::$evaluationTheoryCounter <= $evaluationLimit)
        {
            $evaluation = new Evaluation();
            $scope = 'Theory';
            $evaluation->InitializeEvaluation($course, $scope);
            self::$evaluationTheoryCounter++;
            return true;
        }
        self::$evaluationTheoryCounter=0;
        return true;
    }

    public static function initializeEvaluationPractice(Course $course, $evaluationLimit)
    {
        if (self::$evaluationPracticeCounter <= $evaluationLimit) 
        {
        $evaluation = new Evaluation();
        $scope = 'Practice';
        $evaluation->InitializeEvaluation($course, $scope);
        self::$evaluationPracticeCounter++;
            return true;
        }
        self::$evaluationPracticeCounter = 0;
        return true;
    }

    public function InitializeEvaluation($course, $scope)
    {
        $this->course_catalog_id = $course->courseCatalog->id;
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

    public function courseCatalog()
    {
        return $this->belongsTo(CourseCatalog::class);
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

}
