<?php 

namespace App\Repositories\CropVarietyTypes;

//use App\Repositories\Traits\Date;
//use App\Repositories\CropVarietyTypes\Traits\CropVarietyTypesEvents;
//use App\Repositories\CropVarietyTypes\Traits\CropVarietyTypesPresenters;
use App\Repositories\CropVarietyTypes\Traits\CropVarietyTypesRelationships;
//use App\Repositories\CropVarietyTypes\Traits\CropVarietyTypesScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CropVarietyType extends Model  {

    use CropVarietyTypesRelationships, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'crop_variety_types';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'crop_id',
        'crop_variety_type_name',
        'crop_variety_type_code',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = ['id'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'is_god'    => 'boolean',
    // ];
}