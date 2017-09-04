<?php 

namespace App\Repositories\Countries;

use App\Repositories\Cities\City;
use App\Repositories\Regions\Region;
use App\Repositories\States\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Country extends Model  {

    use Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['country_name', 'country_lat', 'country_lng'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function state()
    {
        return $this->hasMany(State::class);
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