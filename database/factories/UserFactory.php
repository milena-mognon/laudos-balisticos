<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Secao;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'nome' => mb_strtolower($faker->name),
        'email' => $faker->unique()->safeEmail,
        'cargo_id' => factory(Cargo::class),
        'secao_id' => factory(Secao::class),
        'password' => bcrypt(str_random(10)), // secret
        'remember_token' => str_random(10),
    ];
});
