<?php

/**
 * Return a select from the localization file
 * @return string
 */
if (!function_exists('select')) {
    function select(string $section, bool $emptyFirstOption = true)
    {
        $select = trans('selects.' . $section);
        
        return $emptyFirstOption ? ['' => ''] + $select : $select;
    }
}

/**
 * Return a select from the localization file
 * Using the format value-value
 * @return string
 */
if (!function_exists('select_self')) {
    function select_self(string $section, bool $emptyFirstOption = true)
    {
        $select = trans('selects.' . $section);
        $list = [];
        
        foreach($select as $key => $value) {
            $list = array_merge([$value => $value], $list);
        }

        return ['' => ''] + $list;
    }
}