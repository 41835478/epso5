<?php 

/**
 * Renerate a custom randon key.
 * @return string
 */
if (!function_exists('generate_key')) {
    function generate_key($length = 20)
    {
        return time() .  str_random($length);
    }
}

/**
 * Renerate a custom randon key.
 * @return string
 */
if (!function_exists('generate_key_md5')) {
    function generate_key_md5($length = 50)
    {
        return md5(time() .  str_random($length));
    }
}

/**
 * Renerate a custom randon password.
 * @return string
 */
if (!function_exists('generate_password')) {
    function generate_password($length = 10)
    {
        return str_random($length);
    }
}

/**
 * Check if the password exist or create a new one.
 * @return string
 */
if (!function_exists('has_password')) {
    function has_password($password = null)
    {
        return empty($password) 
            ? generate_password(12) 
            : $password;
    }
}