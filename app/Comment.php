<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $CommentId
 * @property string $Comment
 * @property string $CommentDate
 */
class Comment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'comment';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'CommentId';

    /**
     * @var array
     */
    protected $fillable = ['Comment', 'CommentDate'];

}
