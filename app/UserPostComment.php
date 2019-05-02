<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $UserId
 * @property int $PostId
 * @property int $CommentId
 */
class UserPostComment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'userpostcomment';

    /**
     * @var array
     */
    protected $fillable = [];

}
