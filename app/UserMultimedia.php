<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $UserId
 * @property int $MultimediaId
 */
class UserMultimedia extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usermultimedia';

    /**
     * @var array
     */
    protected $fillable = ['UserId', 'MultimediaId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo('App\User', 'UserId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Multimedia()
    {
        return $this->hasOne('App\Multimedia', 'MultiMediaId', 'MultiMediaId');
    }
}
