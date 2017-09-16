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
    function getCropName($data = null) : string
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
    function getCropId() : int
    {
        //Return an array: 'config', 'irrigation', 'region' and 'training'
        return getConfig('crop', 'id');
    }
}

/**
 * Get the client ID
 * @param  object $data
 * @return  string
 */
if (!function_exists('getClientId')) {
    function getClientId() : int
    {
        //Return an array: 'config', 'irrigation', 'region' and 'training'
        return getConfig('client', 'id');
    }
}

/**
 * Get the client NAME
 * @param  object $data
 * @return  string
 */
if (!function_exists('getClientName')) {
    function getClientName() : string
    {
        //Return an array: 'config', 'irrigation', 'region' and 'training'
        return getConfig('client', 'name');
    }
}

/**
 * Get the crop variety type value
 * @param  object $data
 * @return  string
 */
if (!function_exists('getCropType')) {
    function getCropType() : bool
    {
        return getConfig('crop', 'type');
    }
}