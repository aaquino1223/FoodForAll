<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PostTypeId
 * @property string $Description
 */
class PostType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'posttype';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'PostTypeId';

    /**
     * @var array
     */
    protected $fillable = ['Description'];

}
