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
        $file   = $file ?? no_image();
        $folder = $this->folder ?? 'clients';
        $width  = $this->width ?? 100;
        $class  = $this->class ? ' ' . $this->class : '';
        //
        return sprintf('<img src="%s" class="img-thumbnail%s">', route('dashboard.image', [$folder, $file, $width]), $class);
    }
}
