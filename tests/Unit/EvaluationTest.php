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

public function testSkillSelfEvaluationIsNotEmpty ()
{
$skill = new Evaluation;
$result =$skill->skillSelfEvaluation();
$this->assertNotEmpty($result);
}

public function testSkillSelfEvaluationIsNotString ()
{
$skill = new Evaluation;
$result =$skill->skillSelfEvaluation();
$this->assertIsNotString($result);
}

public function testAllEvaluationsIsObject(){

    $Evaluation = new Evaluation();
    $Evaluation->GetAllEvaluations();
    $this->assertIsObject($Evaluation);
}


public function testIfEvaluationByUserIdIsEmpty (){
    $user_id = 0;
    $Evaluation = new Evaluation();
    $EvaluationByUserId = $Evaluation->GetEvaluationByUserId($user_id);
    $this->assertEmpty($EvaluationByUserId);

    }

public function testEvaluationByUserIdReturnAnObject(){
    $user_id = 1;
    $Evaluation = new Evaluation();
    $EvaluationByUserId = $Evaluation->GetEvaluationByUserId($user_id);
    $this->assertIsObject($EvaluationByUserId);
}

public function testIfReturnOnlyEvaluationByUserId(){
    $user_id = 1;
    $Evaluation = new Evaluation();
    $EvaluationByUserId = $Evaluation->GetEvaluationByUserId($user_id)->unique('user_id')->get();
    dd($EvaluationByUserId);
    $this->assertEquals($user_id, $EvaluationByUserId);

}

}
