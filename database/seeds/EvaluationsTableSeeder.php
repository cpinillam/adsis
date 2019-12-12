<?php

use Illuminate\Database\Seeder;

class EvaluationsTableSeeder extends Seeder
{
        public function run()
    {
        factory(App\Evaluation::class, 50)->create();
    }
}
