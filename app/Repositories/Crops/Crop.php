<?php 

namespace App\Repositories\Crops;

//use App\Repositories\Traits\Date;
//use App\Repositories\Crops\Traits\CropsEvents;
//use App\Repositories\Crops\Traits\CropsPresenters;
use App\Repositories\Crops\Traits\CropsRelationships;
//use App\Repositories\Crops\Traits\CropsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Crop extends Model  {

    use CropsRelationships, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'crops';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'crop_name', 
        'crop_module', 
        'crop_type', 
        'crop_description'
    ];
}