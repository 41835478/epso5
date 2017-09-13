<?php

/**
 * Get the client config file
 * @param  int $field
 * @param  int $key ['id', 'name']
 * @return  string
 */
if (!function_exists('getConfig')) {
    function getConfig($field, $key = null)
    {
        //Return a string: 'client' and 'crop'
        if ($key) {
            return Credentials::config()->get($field)[0][$key] ?? Credentials::config()->get($field)[$key];
        }
        //Return an array: 'config', 'irrigation', 'region' and 'training'
        return Credentials::config()->get($field);
    }
}

/**
 * Get the crop name
 * @param  object $data
 * @return  string
 */
if (!function_exists('getCropName')) {
    function getCropName($data = null)
    {
        //If we get data from the DB...
        if ($data) {
            return $data->crop->crop_name;
        }
        //Return an array: 'config', 'irrigation', 'region' and 'training'
        return getConfig('crop', 'name');
    }
}

/**
 * Get the crop name
 * @param  object $data
 * @return  string
 */
if (!function_exists('getCropId')) {
    function getCropId()
    {
        //Return an array: 'config', 'irrigation', 'region' and 'training'
        return getConfig('crop', 'id');
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