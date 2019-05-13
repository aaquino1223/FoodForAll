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

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['FollowDate'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'UserId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function follower()
    {
        return $this->hasOne('App\User', 'UserId', 'FollowerId');
    }

}
