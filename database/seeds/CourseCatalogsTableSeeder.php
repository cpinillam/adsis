<?php

use Illuminate\Database\Seeder;

class CourseCatalogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CourseCatalog::class, 4)->create();
    }
}
