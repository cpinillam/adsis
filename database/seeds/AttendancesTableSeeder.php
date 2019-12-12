<?php

use Illuminate\Database\Seeder;

class AttendancesTableSeeder extends Seeder
{
        public function run()
    {
        factory(App\Attendance::class, 10)->create();
    }
}
