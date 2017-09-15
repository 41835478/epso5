<?php 

/**
 * Thumbnail
 */
Html::macro('thumbnail', function($file = null, $folder = 'clients', $width = 100, $class = '')
{
    $route = route('dashboard.image', [$folder, $file ?? no_image(), $width]);
        return sprintf('<img src="%s" class="img-thumbnail %s">', $route, $class);
}); 