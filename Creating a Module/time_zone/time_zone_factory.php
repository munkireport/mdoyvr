<?php

// Database seeder
// Please visit https://github.com/fzaninotto/Faker for more options

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Time_zone_model::class, function (Faker\Generator $faker) {

    return [
        'time_zone' => $faker->timezone(),
        'network_time_server' => $faker->domainName(),
        'network_time_enabled' => $faker->boolean(),
        'auto_time_zone' => $faker->boolean(),
    ];
});
