<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $LocationId
 * @property string $LocationName
 * @property string $BuildingNumber
 * @property string $Street
 * @property string $Apt
 * @property string $City
 * @property string $State
 * @property string $Zip
 * @property float $Latitude
 * @property float $Longitude
 */
class Location extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'location';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'LocationId';

    /**
     * @var array
     */
    protected $fillable = ['LocationName', 'BuildingNumber', 'Street', 'Apt', 'City', 'State', 'Zip', 'Latitude', 'Longitude'];

}
