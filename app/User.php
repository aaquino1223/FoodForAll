<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * @property int $UserId
 * @property string $UserName
 * @property string $Password
 * @property string $DateOfBirth
 * @property string $Email
 * @property boolean $IsOrganization
 * @property string $InsertedDate
 * @property string $LastUpdatedDate
 */
class User extends Model implements  AuthenticatableContract
{
    use Authenticatable;

    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'UserId';

    /**
     * @var array
     */
    protected $fillable = ['UserName', 'Password', 'DateOfBirth', 'Email', 'IsOrganization', 'InsertedDate', 'LastUpdatedDate'];


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Password;
    }
}
