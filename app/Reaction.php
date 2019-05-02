<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ReactionId
 * @property int $UserId
 * @property int $ReactionTypeId
 * @property string $ReactionDate
 */
class Reaction extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reaction';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ReactionId';

    /**
     * @var array
     */
    protected $fillable = ['UserId', 'ReactionTypeId', 'ReactionDate'];

}
