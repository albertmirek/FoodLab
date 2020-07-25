<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Menu;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id'=> factory(User::class),
        'menu_id'=> factory(Menu::class)
    ];
});
