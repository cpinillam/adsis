<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Controllers\EvaluationController;
use App\Evaluation;

class EvaluationTest extends TestCase
{/*
    public function testBasicTest()
    {
        $this->assertTrue(true);
    } */

public $evaluationId = 1;
public $evaluationUserIdNull = 0;
public $evaluationUserId = 1;


public function testGetEvaluationData()
{

    $Evaluation = new Evaluation();
    $evaluationData = $Evaluation->GetEvaluationData($this->evaluationId);
    $this->assertIsObject($evaluationData);
}

public function  testGetEvaluationUserIdIsInt()
{
    $Evaluation = new Evaluation();
    $evaluationUserId = $Evaluation->GetEvaluationUserId($this->evaluationId);
    $this->assertIsInt($evaluationUserId);

}

public function testGetEvaluationDate()
{
}

    public function testAllEvaluationsIsObject(){

    $Evaluation = new Evaluation();
    $Evaluation->GetAllEvaluations();
    $this->assertIsObject($Evaluation);
}


public function testIfEvaluationByUserIdIsEmpty (){

    $Evaluation = new Evaluation();
    $EvaluationByUserId = $Evaluation->GetEvaluationByUserId($this->evaluationUserIdNull);
    $this->assertEmpty($EvaluationByUserId);

    }

public function testEvaluationByUserIdReturnAnObject(){

    $Evaluation = new Evaluation();
    $EvaluationByUserId = $Evaluation->GetEvaluationByUserId($this->evaluationUserId);
    $this->assertIsObject($EvaluationByUserId);
}

public function testIfReturnOnlyEvaluationByUserId(){

    $Evaluation = new Evaluation();
    $EvaluationByUserId = $Evaluation->GetEvaluationByUserId($this->evaluationUserId)->first();
    $UserIdOfEvaluation = $EvaluationByUserId->user_id;
    $this->assertEquals($this->evaluationUserId, $UserIdOfEvaluation);

}

}
