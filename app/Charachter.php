<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charachter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Charachter';

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
    protected $fillable = ['name', 'm', 'ws', 'bs', 's', 't', 'w', 'i', 'a', 'ld', 'sv', 'specialRules', 'equipment', 'xp']

    
}
