<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        
        $this->call(CourseCatalogsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(AttendancesTableSeeder::class);
        $this->call(EvaluationsTableSeeder::class);
    }
}
