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

    public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = ['AcceptedDate', 'Accepted'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requester()
    {
        return $this->belongsTo('App\User', 'RequesterId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo('App\User', 'RecipientId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function associateType()
    {
        return $this->hasOne('App\AssociateType', 'AssociateTypeId', 'AssociateTypeId');
    }
}
