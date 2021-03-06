<?php 

namespace App\Repositories\Biocides;

//use App\Repositories\Traits\Date;
//use App\Repositories\Biocides\Traits\BiocidesEvents;
//use App\Repositories\Biocides\Traits\BiocidesPresenters;
//use App\Repositories\Biocides\Traits\BiocidesRelationships;
//use App\Repositories\Biocides\Traits\BiocidesScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Biocide extends Model  {

    use Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'biocides';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'biocide_num',
        'biocide_name',
        'biocide_company',
        'biocide_formula',
    ];
}