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
        DB::table('users')->insert([
            'id' =>  '1',
            'role_id'=>'1',
            'name'=>'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]);
    }
}
