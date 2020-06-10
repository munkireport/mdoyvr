<?php

// Database seeder
// Please visit https://github.com/fzaninotto/Faker for more options

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(I_munkireport_model::class, function (Faker\Generator $faker) {

    return [
        'field_1' => $faker->word(),
        'field_2' => $faker->word(),
        'field_3' => $faker->word(),
    ];
});
