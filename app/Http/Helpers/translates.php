<?php 

/**
 * Return the singular or plural title for a section, in a language file
 * @param   $section
 * @param   $type ['singular', 'plural']
 * 
 * @return  string
 */
if (!function_exists('trans_title')) {
    function trans_title(string $section, string $type = 'plural')
    {
        if($type === 'plural') {
            return trans('sections/' . $section . '.title:plural');
        }
        return trans('sections/' . $section . '.title');
    }
}

/**
 * Return the slanguage file in the section folder
 * @param   $file
 * 
 * @return  string
 */
if (!function_exists('sections')) {
    function sections(string $file)
    {
        return trans('sections/' . $file);
    }
}