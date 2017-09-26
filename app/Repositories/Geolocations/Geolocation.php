<?php 

namespace App\Repositories\Geolocations;

use App\Repositories\Geolocations\Traits\GeolocationsRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Geolocation extends Model  {

    use GeolocationsRelationships, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'geolocations';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plot_id',
        'geo_lat',
        'geo_lng',
        'geo_x',
        'geo_y',
        'geo_bbox',
        'geo_sigpac_region',
        'geo_sigpac_city',
        'geo_sigpac_aggregate',
        'geo_sigpac_zone',
        'geo_sigpac_polygon',
        'geo_sigpac_plot',
        'geo_sigpac_precinct',
        'geo_catastro',
        'geo_catastro_url',
        'geo_zip',
        'geo_height',
        'frame_width',
        'frame_height',
    ];
}