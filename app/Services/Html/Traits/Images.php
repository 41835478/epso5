<?php 
/**
 * Available methods: 
    * link()
    * render_link()
 */

namespace App\Services\Html\Traits;

trait Images
{
    /**
     * Generate the links
     * @return string
     */
    public function thumbnail($file = null)
    {
        $folder = $this->folder ?? 'clients';
        $width  = $this->width ?? 100;
        $class  = $this->class ? ' ' . $this->class : '';
        //
        return sprintf('<img src="%s" class="thumbnail%s">', route('dashboard.image', [$folder, $file, $width]), $class);
    }
}
