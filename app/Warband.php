<?php

namespace Mordheim;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Warband extends Model
{

    /**
     * Model is searchable with laravel/scout
     */
    use Searchable;

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
     * Get the User that owns the warbands.
     */
    public function User()
    {
        return $this->belongsTo('Mordheim\User');
    }

    /**
     * Get the Type of the warbands.
     */
    public function Type()
    {
        return $this->belongsTo('Mordheim\Type');
    }

    public function searchableAs()
    {
        $array = $this->with('relations')->toArray();

        // Customize array...

        return $array;
    }

}
