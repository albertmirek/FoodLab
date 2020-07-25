<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
            'meal_id'=>factory(Meal::class),
            'meal_type'=> $faker->randomElement(['breakfast','lunch','dinner']),
            'menu_date'=> $faker->date()
    ];
});
