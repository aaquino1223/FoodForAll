<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RequesterId
 * @property int $RecipientId
 * @property int $AssociateTypeId
 * @property string $RequestedDate
 * @property string $AcceptedDate
 * @property boolean $Accepted
 */
class Associate extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'associate';

    /**
     * @var array
     */
    protected $fillable = ['AcceptedDate', 'Accepted'];

}
