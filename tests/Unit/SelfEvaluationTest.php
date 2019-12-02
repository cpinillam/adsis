<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Http\Controllers\SelfEvaluationController;

class SelfEvaluationTest extends TestCase
{/* 
    public function testBasicTest()
    {
        $this->assertTrue(true);
    } */

public function testSkillSelfEvaluationIsNotEmpty ()
{
$skill = new SelfEvaluationController;
$result =$skill->skillSelfEvaluation();
$this->assertNotEmpty($result);
}

public function testSkillSelfEvaluationIsNotString ()
{
$skill = new SelfEvaluationController;
$result =$skill->skillSelfEvaluation();
$this->assertIsNotString($result);
}


}
