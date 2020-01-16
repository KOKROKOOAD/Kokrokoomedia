<?php

use Faker\Generator as Faker;

$factory->define(App\Receipt::class, function (Faker $faker) {
    return [
        'transaction_id' => rand(1,20),
       // 'ads_id' => rand(1,20),
        'amount' => $faker->numberBetween(100,20000),

    ];
});
