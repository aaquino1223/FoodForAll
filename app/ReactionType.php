<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ReactionTypeId
 * @property string $Description
 */
class ReactionType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'reactiontype';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ReactionTypeId';

    /**
     * @var array
     */
    protected $fillable = ['Description'];

}
