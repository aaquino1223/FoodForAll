<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $AssociateTypeId
 * @property string $Description
 */
class AssociateType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'associatetype';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'AssociateTypeId';

    /**
     * @var array
     */
    protected $fillable = ['Description'];

}
