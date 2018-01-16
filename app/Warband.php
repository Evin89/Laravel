<?php

namespace Mordheim;

use Illuminate\Database\Eloquent\Model;

class Warband extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Warbands';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'rating', 'type_id', 'active'
    ];

    /**
     * Get the User that owns the warband.
     */
    public function User()
    {
        return $this->belongsTo('Mordheim\User');
    }

    /**
     * Get the Type of the warband.
     */
    public function Type()
    {
        return $this->belongsTo('Mordheim\Type');
    }


}
