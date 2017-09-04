<?php 

namespace App\Repositories\States;

use App\Repositories\Cities\City;
use App\Repositories\Countries\Country;
use App\Repositories\Regions\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class State extends Model  {

    use Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'states';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['country_id', 'state_name', 'state_lat', 'state_lng'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        return $this->hasMany(Region::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }
}