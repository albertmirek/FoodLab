<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
//        factory('App\User', 10)->create()->each(function ($user){
//            $user->posts()->save(factory('App\Post')->make());
//        });
        DB::table('users')->insert([
            'id' =>  '1',
            'role_id'=>'1',
            'name'=>'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]);
    }
}
