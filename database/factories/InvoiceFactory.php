<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'ads_id' => 1,
        'amount' =>rand(100,200000),
       // 'payment_method' => $faker->numberBetween(100,30000)
    ];
});
