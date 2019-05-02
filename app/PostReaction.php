<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PostId
 * @property int $ReactionId
 */
class PostReaction extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'postreaction';

    /**
     * @var array
     */
    protected $fillable = [];

}
