<?php 

/*
|--------------------------------------------------------------------------
| Links
|--------------------------------------------------------------------------
*/
    /**
     * Generate a coustom link
     * @param string $attributes
     * 
     * @return  string
     */
    Html::macro('newLink', function($attributes = [])
    {
        //Return the values
        return Html::linkBuilder($attributes);
    }); 

    /**
     * Generate a link for create
     * @param string $section
     * @param string $route
     * @param string $routeValue [the value for the route]
     * 
     * @return  string
     */
    Html::macro('createLink', function($section, $route, $routeValue = null)
    {
        $route = $routeValue 
            ? route('dashboard.' . $route . '.' . $section . '.create', $routeValue) 
            : route('dashboard.' . $route . '.' . $section . '.create'); 
        //Return the values
        return Html::linkBuilder([
            'title' => icon('new', trans('buttons.new')),
            'class' => 'dropdown-item',
            'route' => $route,
            'id' => 'button-create-link',
        ]);
    }); 

    /**
     * Generate a link for delete
     * @param array $attributes
     * 
     * @return  string
     */
    Html::macro('deleteLink', function()
    {
        //Return the values
        return Html::linkBuilder([
            'title' => icon('delete', trans('buttons.delete')),
            'class' => 'dropdown-item trigger-modal',
            'type' => 'delete',
            'id' => 'button-eliminate-link',
        ]);
    }); 

    /**
     * The link builder
     * @param array $attributes
     * 
     * @return  string
     */
    Html::macro('linkBuilder', function(array $attributes = [])
    {
        //Case: title. attributes[0] in case only 1 attribute, must be the title...
        $title = $attributes['title'] ?? $attributes[0];
        //Case: Route. attributes[1] if exists... must be the url ...
        $route = $attributes['route'] ?? ($attributes[1] ?? '#');
        //Case: Target
        $target = (!empty($attributes['target'])) ? ' data-target="' . $attributes['target'] . '"' : '';
        //Case: Type
        $type = (!empty($attributes['type'])) ? ' data-type="' . $attributes['type'] . '"' : '';
        //Case: ID
        $id = (!empty($attributes['id'])) ? ' id="' . $attributes['id'] . '"' : '';
        //Case: class
        $class = (!empty($attributes['class'])) ? $attributes['class'] : '';
            //Return the values
            return sprintf('<a href="%s"%s class="%s"%s%s>%s</a>', $route, $id, $class, $target, $type, $title);
    }); 