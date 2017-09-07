<?php 

namespace App\Repositories\Regions;

use App\Repositories\Regions\Traits\RegionsRelationships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Region extends Model  {

    use Notifiable, RegionsRelationships, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regions';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['country_id', 'state_id', 'region_name', 'region_lat', 'region_lng'];
}