<?php

use Faker\Generator as Faker;

$factory->define(App\Ads::class, function (Faker $faker) {
    return [

        'user_id' => rand(1,20),
        'ad_title' => $faker->sentence,
        'media_house' => $faker->jobTitle,
        'services' => $faker->words,
        // 'status' => $faker->boolean,
        //  'created_at'  => $faker->dateTime
    ];
});
