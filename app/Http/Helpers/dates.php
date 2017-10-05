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

/**
 * Get the different (in days) from to day to the next inspection
 *
 * @param  date $lastInspectionDate [The last inspection date]
 * @param  int $nextInspectionInDays [Inspection each x days]
 * @param  string $format [date or day]
 * 
 * @return string
 */
if (!function_exists('next_inspection')) {
    function next_inspection($lastInspectionDate = null, $nextInspectionInDays = null, $format = 'date')
    {
        if($lastInspectionDate && $nextInspectionInDays) {
            //Calculate the next inspection date from: last date and days to next inspection
            $nextInspection = Carbon::createFromFormat('d/m/Y', $lastInspectionDate)->addDays($nextInspectionInDays);
            //Different (in days) from today and the next inspection
            $days = Carbon::now()->diffInDays($nextInspection, false);
            //Select format
            if($days > 0) {
                if($format === 'date') {
                    return $nextInspection->format('d/m/Y') ?? null;
                }
                return $days ?? null;
            }
        }
        //No results
        return null;
    }
}