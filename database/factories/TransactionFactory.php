<?php

use Faker\Generator as Faker;

$factory->define(App\Transactions::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'invoice_id' => 1,
        'ads_id' => 1,
        'transaction_status' => 'pending',
        'amount' => $faker->numberBetween(100,20000),
        // 'payment_method' => $faker->numberBetween
    ];
});
