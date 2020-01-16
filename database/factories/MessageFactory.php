<?php

use Faker\Generator as Faker;

$factory->define(App\Messages::class, function (Faker $faker) {
    return [

        'user_id' => rand(1,50),
        'message' => $faker->sentence,

    ];
});
