<?php

/**
 * Return the position of a field in an array.
 * Return the previus position, the actual position will be $x + 1
 * @return string
 */
if (!function_exists('get_position_in_array')) {
    function get_position_in_array(array $array, string $field)
    {
        for ($x = 0; $x < count($array); $x++) {
            if ($field == $array[$x]) {
                return $x;
            }
        }
    }
}

/**
 * Return the random "item" from an array. Just the item!!!
 * @param  array $array
 * @return  string
 */
if (!function_exists('random_array')) {
    function random_array(array $array)
    {
        return collect($array)->random();
    }
}

/**
 * Return a range array
 * @param  int $start
 * @param  int $end 
 * @return  string
 */
if (!function_exists('range')) {
    function range(int $start, int $end, array $lists = [])
    {
        for($x = 0; $x < $start; $x++) {
            $lists[$x] = $x;
        }
        return $lists;
    }
}