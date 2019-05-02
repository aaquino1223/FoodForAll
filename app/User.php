<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class User extends Model
{
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

}
