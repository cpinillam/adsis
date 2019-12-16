<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Attendance;

class AttendanceTest extends TestCase
{
    public $NullUserId = '';
    public $arrayWithoutData = array();
    
    public function testAttendanceGetMultipleWithNoData()
    {
        $attendance= new Attendance;
        $response = $attendance->GetMultiple($this->arrayWithoutData);
        $this->assertTrue($response);
    }
}
