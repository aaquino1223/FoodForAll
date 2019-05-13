<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ViewRestrictionTypeId
 * @property string $Description
 */
class ViewRestrictionType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'viewrestrictiontype';

    public $timestamps = false;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ViewRestrictionTypeId';

    /**
     * @var array
     */
    protected $fillable = ['Description'];

}
