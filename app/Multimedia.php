<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $MultiMediaId
 * @property string $Media
 * @property string $MimeType
 * @property int $MultiMediaTypeId
 */
class Multimedia extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'MultiMediaId';

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['Media', 'MultiMediaTypeId'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function multimediaType()
    {
        return $this->hasOne('App\MultimediaType', 'MultiMediaTypeId', 'MultiMediaTypeId');
    }

}
