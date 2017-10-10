<?php 

namespace Tests\Helpers;

use App\Repositories\Pests\Pest;

trait PestHelpers
{    
    protected $pestByCrop;

   /**
    * Where client is
    *
    * @return Object
    */
   public function pestByCrop($crop) : Pest
   {
       if($this->pestByCrop) {
           return $this->pestByCrop;
       }
       return $this->pestByCrop = Pest::where('crop_id', is_object($crop) ? $crop->crop_id : $crop)->inRandomOrder()->first();
   }
}