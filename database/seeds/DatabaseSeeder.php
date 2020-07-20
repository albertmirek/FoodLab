<?php

use Illuminate\Database\Seeder;

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
        DB::table('meals')->insert([
            'user_id'=> 1,
            'name' => Str::random(10)
        ]);
    }
}
