<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $PostId
 * @property int $UserId
 * @property int $PostTypeId
 * @property string $Title
 * @property string $Message
 * @property string $PostDate
 * @property int $ViewRestrictionTypeId
 */
class Post extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'post';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'PostId';

    /**
     * @var array
     */
    protected $fillable = ['UserId', 'PostTypeId', 'Title', 'Message', 'PostDate', 'ViewRestrictionTypeId'];

}