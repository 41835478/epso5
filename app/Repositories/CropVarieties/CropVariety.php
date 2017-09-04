<?php 

namespace App\Repositories\CropVarieties;

//use App\Repositories\Traits\Date;
//use App\Repositories\CropVarieties\Traits\CropVarietiesEvents;
//use App\Repositories\CropVarieties\Traits\CropVarietiesPresenters;
//use App\Repositories\CropVarieties\Traits\CropVarietiesRelationships;
//use App\Repositories\CropVarieties\Traits\CropVarietiesScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CropVariety extends Model  {

    use Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'crop_varieties';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'crop_id',
        'crop_variety_name', 
        'crop_variety_type', 
    ];
}