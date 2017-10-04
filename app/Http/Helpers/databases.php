<?php

/**
 * Model: user 
 * Factory helper
 * @return array
 */
if (!function_exists('factory_user')) {
    function factory_user($faker, array $new_array) : array
    {
        static $password;

        $user = [
            'name'              => $faker->name,
            'email'             => $faker->unique()->safeEmail,
            'password'          => $password ?: $password = generate_password(),
            'locale'            => 'es',
            'agreement'         => '127.0.0.1',
        ];

        return array_merge($user, $new_array);
    }
}