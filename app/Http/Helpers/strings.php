<?php 

/**
 * Generate the random leter
 * @param  string $length 
 * @return string
 */
if (!function_exists('random_letter')) {
    function random_letter(int $length = 1)
    {
        return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -$length);
    }
}

/**
 * Convert a list of items in a array
 * @param  string $length 
 * @return string
 */
if (!function_exists('items_list')) {
    function items_list()
    {
        return explode(',', request('item-list'));
    }
}

/**
 * Convert a list of items in a array
 * @param  string $text 
 * @param  string $length 
 * @return string
 */
if (!function_exists('typeText')) {
    function typeText($text, $length = 5)
    {
        return substr($text, 0, $length);
    }
}