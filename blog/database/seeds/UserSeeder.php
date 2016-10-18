<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*DB::table('users')->insert([
       	'name' => 'Pedrito Perez',
       	'email' => 'pedrito@gmail.com',
       	'password' => bcrypt('pedrito'), 
       	'type' =>'member'


       	]); */
       	//crear varios usarios a la vez
       	factory(App\User::class,50)->create();
    }
}
