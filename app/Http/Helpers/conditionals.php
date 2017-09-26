<?php 

/**
 * Generate the random leter
 * @param  string $data 
 * @param  string $conditionIfTrue 
 * @param  string $conditionIfFalse 
 * @return string
 */
if (!function_exists('conditional')) {
    function conditional($data = null, $conditionIfTrue, $conditionIfFalse)
    {
        if($data) {
            return $conditionIfTrue;
        }
        return $conditionIfFalse;
    }
}