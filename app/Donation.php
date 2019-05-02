<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $DonationId
 * @property int $PostId
 * @property string $ItemDescription
 * @property int $Quantity
 * @property string $Measure
 * @property boolean $IsDonated
 */
class Donation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'donation';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'DonationId';

    /**
     * @var array
     */
    protected $fillable = ['PostId', 'ItemDescription', 'Quantity', 'Measure', 'IsDonated'];

}
