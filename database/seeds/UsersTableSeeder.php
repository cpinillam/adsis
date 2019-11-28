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
        factory(App\User::class)->create(['name'=> 'nellay', 'email'=>'tigre@gmail.com', 'rol'=>'admin']);
        factory(App\User::class,10)->create();
    }
}
