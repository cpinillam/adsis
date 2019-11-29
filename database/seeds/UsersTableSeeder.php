<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create(['name'=> 'nellay', 'email'=>'tigre@gmail.com', 'rol'=>2]);
        factory(App\User::class,4)->create();
    }
}
