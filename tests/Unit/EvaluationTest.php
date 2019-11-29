<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Http\Controllers\EvaluationController;

class EvaluationTest extends TestCase
{/* 
    public function testBasicTest()
    {
        $this->assertTrue(true);
    } */

public function testSkillSelfEvaluationIsNotEmpty ()
{
$skill = new EvaluationController;
$result =$skill->skillSelfEvaluation();
$this->assertNotEmpty($result);
}

public function testSkillSelfEvaluationIsNotString ()
{
$skill = new EvaluationController;
$result =$skill->skillSelfEvaluation();
$this->assertIsNotString($result);
}


}
