<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

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

    protected $primaryKey = ['RequesterId', 'RecipientId', 'AssociateTypeId', 'RequestedDate'];
    public $incrementing = false;

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

    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
