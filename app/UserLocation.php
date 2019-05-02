<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $UserId
 * @property int $LocationId
 */
class UserLocation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'userlocation';

    /**
     * @var array
     */
    protected $fillable = [];

}
