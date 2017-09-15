<?php

/**
 * Create an option select field with bind data
 * @param intenger $data [The DB value]
 * @param intenger $value
 * @param intenger $title
 * @return string
 */
if (!function_exists('selected')) {
    function selected($data, $value = null, $title = null)
    {
        $selected = ($data == $value) ? ' selected' : '';
            return sprintf('<option data-title="%s" value="%s"%s>%s</option>', $title, $value, $selected, $title);
    }
}