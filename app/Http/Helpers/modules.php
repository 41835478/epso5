<?php 

/**
 * Generate the modals path
 * @param  string $module 
 * @param  string $file 
 * @return string
 */
if (!function_exists('module_path')) {
    function module_path(string $module, $file = 'crop')
    {
        return ($module === 'error') 
            ? dashboard_path('_modules.error')
            : dashboard_path('_modules.' . $module . '.') . $file;
    }
}

/**
 * Get the crop module name
 * @param  int $field
 * @param  int $key ['id', 'name']
 * @return  string
 */
if (!function_exists('getModule')) {
    function getModule()
    {
        return getConfig('crop', 'module');
    }
}