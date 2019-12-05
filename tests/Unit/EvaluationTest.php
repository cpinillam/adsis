<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Evaluation;

class EvaluationTest extends TestCase
{
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


}
