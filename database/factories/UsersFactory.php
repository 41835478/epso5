<?php

use App\Repositories\Users\User;

/*
|--------------------------------------------------------------------------
| Users and Profile Factories
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->defineAs(User::class, 'user_god',function (Faker\Generator $faker) {
    return factory_user($faker, [
        'is_god'            => true,
        'is_admin'          => true,
        'is_editor'         => true,
        'is_user'           => true,
        'tools'             => true,
        'client_id'         => 1,
    ]);
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->defineAs(User::class, 'user_admin',function (Faker\Generator $faker) {
    return factory_user($faker, [
        'is_god'            => false,
        'is_admin'          => true,
        'is_editor'         => true,
        'is_user'           => true,
        'tools'             => false,
        'client_id'         => 1,
    ]);
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->defineAs(User::class, 'user_editor',function (Faker\Generator $faker) {
    return factory_user($faker, [
        'is_god'            => false,
        'is_admin'          => false,
        'is_editor'         => true,
        'is_user'           => true,
        'tools'             => false,
        'client_id'         => 1
    ]);
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    return factory_user($faker, [
        'is_god'            => false,
        'is_admin'          => false,
        'is_editor'         => false,
        'is_user'           => true,
        'tools'             => false,
        'client_id'         => rand(1,2),
    ]);
});