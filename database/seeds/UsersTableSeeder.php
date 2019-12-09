<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // factory(App\User::class)->create(['name'=> 'nellay', 'email'=>'tigre@gmail.com', 'rol'=>2]);
        factory(App\User::class)->create(['name' => 'enric', 'email' => 'xaxeue@hotmail.com', 'rol' => 2]);
        factory(App\User::class,9)->create();
    }
}
