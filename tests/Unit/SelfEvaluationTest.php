<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Http\Controllers\SelfEvaluationController;

class SelfEvaluationTest extends TestCase
{
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

public function testSkillSelfEvaluationisNotEmpty ()
{
$skill = new SelfEvaluationController;
$result =$skill->skillSelfEvaluation();
$this->assertNotEmpty($result);
}

}
