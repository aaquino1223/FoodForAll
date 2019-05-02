<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $MultiMediaTypeId
 * @property string $Description
 */
class MultimediaType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'multimediatype';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'MultiMediaTypeId';

    /**
     * @var array
     */
    protected $fillable = ['Description'];

}
