<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $UserId
 * @property int $FollowerId
 * @property string $FollowDate
 */
class Follower extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'follower';

    /**
     * @var array
     */
    protected $fillable = ['FollowDate'];

}
