<?php 

/**
 * Generate a randon number with decimals
 * @param  int $min
 * @param  int $max
 * @return array/mixed
 */
if (!function_exists('randonWithDecimals')) {
    function randonWithDecimals(int $min = 1, int $max = 100)
    {
        return mt_rand($min * 10, $max * 10) / 10;
    }
}