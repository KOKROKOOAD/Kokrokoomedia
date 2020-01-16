<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ScheduledAd::class, function (Faker $faker) {
    return [
        'subscription_id' => rand(1,20),
        'client_id' => rand(1,20),
        'media_house_id' => 'K5ba2f53a290f55.38466924',
        'rate_card_id' => rand(1,20),
        'title' => 'tests',
        'start' => '2019-05-28 ',
        'end' => '2019-05-28 ',
        'status' => 'pending',
        'created_ad_data' => '[{"rate"=> "800", "spot": 1, "endDate": "2019-02-20 ", "endTime": "08:00", "durations": 20, "rate_card": "LPMs", "startDate": "2019-02-20 ", "startTime": "07:00"}]',
        'file_name' => 'vod-mo.png',
        'file_type' => 'image/png',
        'file_path' => '00b79bc15dc838c11a77420ecbd997d15d57205d0b7a38a64bf47251324b0faa.png',
        'file_size' => '2030',
        'created_at' => '2019-05-19',
        'updated_at' => '2019-05-19',
    ];
});
