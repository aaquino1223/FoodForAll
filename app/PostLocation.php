<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PostId
 * @property int $LocationId
 */
class PostLocation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'postlocation';

    /**
     * @var array
     */
    protected $fillable = [];

}
