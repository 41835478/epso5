<?php 

namespace Tests\Helpers;

use App\Repositories\CropVarieties\CropVariety;
use App\Repositories\Plots\Plot;

trait VarietyHelpers
{    
    protected $firstVariety;
    protected $lastVariety;

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $type
     *
     * @return Object
     */
    public function lastVariety($type = 'id')
    {
        if($this->lastVariety) {
            return $this->lastVariety;
        }
        $id = Plot::select('crop_variety_id')
            ->groupBy('crop_variety_id')
            ->orderBy('id', 'desc')
            ->first()
            ->crop_variety_id;
                return ($type === 'id') ? $id : CropVariety::find($id)->crop_variety_name;
    }

    /**
     * Create a client but not storing it!!!
     *
     * @param  string $type
     *
     * @return Object
     */
    public function firstVariety($type = 'id')
    {
        if($this->firstVariety) {
            return $this->firstVariety;
        }
        $id = Plot::select('crop_variety_id')->groupBy('crop_variety_id')->orderBy('id', 'asc')->first()->crop_variety_id;
        return ($type === 'id') ? $id : CropVariety::find($id)->crop_variety_name;
    }
}