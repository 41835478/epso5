<?php

/**
 * Return a select with the first option blank
 * @param array $[options]
 * @param bool $[firstOptionBlank]
 * @return string
 */
if (!function_exists('setOptions')) {
    function setOptions(array $options, bool $firstOptionBlank = true)
    {        
        return $firstOptionBlank ? ['' => ''] + $options : $options;
    }
}

/**
 * Return a status field for a form
 * 
 * @param string $status
 * @return string
 */
if (!function_exists('formStatus')) {
    function formStatus($status = null)
    {
        if($status === 'required') {
            return ' ' . 'required="required"';
        }
        if($status === 'disabled') {
            return ' ' . 'disabled="disabled"';
        }
        if($status === 'readonly') {
            return ' ' . 'readonly="readonly"';
        }
        if($status === 'checked') {
            return ' ' . 'checked="checked"';
        }
        if($status === 'selected') {
            return ' ' . 'selected';
        }
        return '';
    }
}

/**
 * Return a status field for a form
 * 
 * @param string $class
 * @return string
 */
if (!function_exists('formClass')) {
    function formClass($class = null)
    {
        return $class 
            ? ' ' . $class 
            : '';
    }
}