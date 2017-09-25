<?php 

namespace App\Repositories\Errors;

use App\Repositories\Errors\Traits\ErrorsRelationships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Errors extends Model  {

    use ErrorsRelationships, Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'errors';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'error_url', 'error_description'];
}