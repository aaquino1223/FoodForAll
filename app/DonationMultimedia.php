<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $DonationId
 * @property int $MultiMediaId
 */
class DonationMultimedia extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'donationmultimedia';

    /**
     * @var array
     */
    protected $fillable = [];

}
