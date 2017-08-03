<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


//factory for creating projects

$factory->define(App\Projects::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' =>  function () {
                return factory(App\User::class)->create()->id;
         },
        'project_name' => $faker->name,
        'project_type' => 'Residential',
        'comments' => $faker->title
    ];
});

