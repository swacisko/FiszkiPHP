<?php

use Faker\Generator as Faker;

$factory->define(App\Memobox::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(2),
        'number_of_compartments' => rand( 4,6 )
    ];
});
