<?php 

namespace App\Repositories\Trainings;

//use App\Repositories\Traits\Date;
//use App\Repositories\Trainings\Traits\TrainingsEvents;
//use App\Repositories\Trainings\Traits\TrainingsPresenters;
use App\Repositories\Trainings\Traits\TrainingsRelationships;
//use App\Repositories\Trainings\Traits\TrainingsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Training extends Model  {

    use Notifiable, SoftDeletes, TrainingsRelationships;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trainings';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_name',
        'training_description'
    ];
}