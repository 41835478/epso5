<?php 

namespace App\Repositories\Irrigations;

use App\Repositories\Irrigations\Traits\IrrigationsRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Irrigation extends Model  {

    use IrrigationsRelationships, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'irrigations';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'irrigation_name',
        'irrigation_description',
    ];
}