<?php

namespace App;

use Highlight\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Evaluation extends Model
{
    public $evaluationTheoryCounter = 0;
    public $evaluationPracticeCounter = 0;

    protected $fillable = ['language', 'attitude', 'workflow', 'learning', 'meteo', 'scope', 'course_id', 'user_id', 'filled'];

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

    public function evaluationCourse()
    {
        return $this->hasOneThrough(
            'App\CourseCatalog',
            'App\Course',
            'course_id_catalog', // Foreign key on Course table...
            'id', // Foreign key on CourseCatalog table...
            'id', // Local key on Evaluation table...
            'id_course' // Local key on Course table...
        );
        dd($this);
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
            'App\CourseCatalog',
            'App\Course',
            'course_id_catalog', // Foreign key on Course table...
            'id', // Foreign key on CourseCatalog table...
            'id', // Local key on Evaluation table...
            'id_course' // Local key on Course table...

        );
    }
}
