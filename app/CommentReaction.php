<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $CommentId
 * @property int $ReactionId
 */
class CommentReaction extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'commentreaction';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Comment()
    {
        return $this->belongsTo('Comment');
    }

}
