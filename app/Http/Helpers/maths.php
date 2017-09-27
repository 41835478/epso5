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

/**
 * Generate a randon number with decimals
 * @param  object $data
 * @return integer
 */
if (!function_exists('cultivatedArea')) {
    function cultivatedArea($attributes)
    {
        $operation = ($attributes['plot_area'] / 100) * $attributes['plot_percent_cultivated_land'];
            return number_format($operation, 2, '.', '');
    }
}