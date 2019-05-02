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

}
