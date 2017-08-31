<?php 

use Carbon\Carbon;

/**
 * Create a date with the spanish fomart
 * @param  string $date
 * @return string
 */
if (!function_exists('date_to_spanish')) {
    function date_to_spanish($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}

/**
 * Create a date with the international fomart
 * @param  string $date
 * @return string
 */
if (!function_exists('date_to_international')) {
    function date_to_international($date)
    {
        return Carbon::createFromFormat('d/m/Y', $date)->format('m/d/Y');
    }
}

/**
 * Create a date with the database fomart
 * @param  string $date
 * @return string
 */
if (!function_exists('date_to_db')) {
    function date_to_db($date)
    {
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }
}