<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PostId
 * @property int $MultiMediaId
 */
class PostMultimedia extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'postmultimedia';

    /**
     * @var array
     */
    protected $fillable = [];

}
