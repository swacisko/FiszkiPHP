<?php

use Faker\Generator as Faker;

$factory->define(App\Flashcard::class, function (Faker $faker) {
    return [
        'category' => $faker->sentence(3),
        'side1_text' => $faker->sentence(30),
        'side2_text' => $faker->sentence(30),
        'last_Edit_date' => $faker->date( 'Y-m-d H:i:s' )
    ];
});
