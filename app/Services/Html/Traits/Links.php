<?php 
/**
 * Available methods: 
    * link()
    * render_link()
 */

namespace App\Services\Html\Traits;

trait Links
{
    /**
     * Generate the links
     * @return string
     */
    public function link(array $attributes = [])
    {
        return $this->linkBuilder($attributes);
    }

    /**
     * Create a resource
     * @return string
     */
    public function linkCreate($route, $section, $value = null)
    {
        $route = $value 
            ? route('dashboard.' . $route . '.' . $section . '.create', $value)
            : route('dashboard.' . $route . '.' . $section . '.create'); 
        return $this->linkBuilder([
            'title' => icon('new', trans('buttons.new')),
            'route' => $route,
            'id' => 'button-create-link',
        ]);
    }

    /**
     * Eliminate a resource
     * @return string
     */
    public function linkEliminate($section)
    {
        return $this->linkBuilder([
            'title' => icon('delete', trans('buttons.delete')),
            'class' => 'modal',
            'type' => 'delete',
            'id' => 'button-eliminate-link',
        ]);
    }

    /**
     * Build the links
     * @return string
     */
    private function linkBuilder(array $attributes = [])
    {
        //Case: no link available
        $title = $attributes['title'] ?? $attributes[0];
        //Case: Route
        $route = $attributes['route'] ?? ($attributes[1] ?? '#');
        //Case: Target
        $target = (!empty($attributes['target'])) ? ' data-target="' . $attributes['target'] . '"' : '';
        //Case: Type
        $type = (!empty($attributes['type'])) ? ' data-type="' . $attributes['type'] . '"' : '';
        //Case: ID
        $id = (!empty($attributes['id'])) ? ' id="' . $attributes['id'] . '"' : '';
        //Case: class 
        if(!empty($attributes['class'])) {
            $this->class($attributes['class']);
        }
        $class = $this->class ? implode(' ', $this->class) : '';
        //Reset the class
        $this->class = [];

        return sprintf('<a href="%s"%s class="%s"%s%s>%s</a>', $route, $id, $class, $target, $type, $title);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers methods
    |--------------------------------------------------------------------------
    */
   
    /**
     * Configure the link for a dropdown
     * @return string
     */
    public function class($class)
    {
        //Class shortcuts 
        if($class === 'modal') {
            $class = 'trigger-modal';
        }

        //Class shortcuts 
        if($class === 'dropdown') {
            $class = 'dropdown-item';
        }

        $this->class[] = $class;

        return $this;
    }
}
