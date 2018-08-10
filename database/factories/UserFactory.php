<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'user_name'=> $faker->name,
        'user_pass'=> bcrypt('123456789'),
        'user_nicename'=> str_random(10),
        'user_email'=> $faker->unique()->safeEmail,
        'user_activation_key'=>'',
        'user_status'=>'3',
        'display_name' => 'Super Admin',
        'remember_token' => str_random(10),
    ];
});
