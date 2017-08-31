<?php 

/**
 * Get the user agent
 * @return string
 */
if (!function_exists('user_agent')) {
    function user_agent($data, $agent = '-')
    {
        if (stripos($data, 'Firefox') != false) {
            $agent = 'Firefox';
        } elseif (stripos($data, 'MSIE') != false) {
            $agent = 'Internet Explorer';
        } elseif (stripos($data, 'iPad') != false) {
            $agent = 'Ipad/OSX';
        } elseif (stripos($data, 'Android') != false) {
            $agent = 'Android';
        } elseif (stripos($data, 'Chrome') != false) {
            $agent = 'Chrome';
        } elseif (stripos($data, 'Safari') != false) {
            $agent = 'Safari';
        } elseif (stripos($data, 'AIR') != false) {
            $agent = 'Air';
        } elseif (stripos($data, 'Fluid') != false) {
            $agent = 'Fluid';
        }
        return $agent;
    }
}

/**
 * Get the user SO
 * @return string
 */
if (!function_exists('user_os')) {
    function user_os($data, $platform = '-')
    {
        $list = [
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        ];
        foreach ($list as $regex => $value) {
            if (preg_match($regex, $data)) {
                $platform    =   $value;
            }
        }
        return $platform;
    }
}

/**
 * Get the user IP
 * @return string
 */
if (!function_exists('user_ip')) {
    function user_ip()
    {
        return Request::ip();
    }
}

/**
 * Get the user Language
 * @return string
 */
if (!function_exists('user_language')) {
    function user_language($availableLanguages, $default = 'en')
    {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            foreach ($langs as $value) {
                $choice = substr($value, 0, 2);
                if (in_array($choice, $availableLanguages)) {
                    return $choice;
                }
            }
        }
        return $default;
    }
}
