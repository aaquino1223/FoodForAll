<?php

namespace App;

use function foo\func;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use function Sodium\add;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentRequests()
    {
        return $this->hasMany('App\Associate', 'RequesterId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receivedRequests()
    {
        return $this->hasMany('App\Associate', 'RecipientId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function associates()
    {
        $associates = $this->receivedRequests()->where('Accepted', true)->get()->map(function ($request) { return $request->requester; });
        $associates = $associates->union($this->sentRequests()->where('Accepted', true)->get()->map(function ($request) { return $request->recipient; }));
        return $associates;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'UserId', 'UserId');
    }

    public function feed()
    {
        $users = $this->associates();
        $posts = $this->posts()->get();

        foreach ($users as $user)
        {
            $posts = $posts->merge($user->posts()->get());
        }

        $posts = $posts->sortByDesc('PostDate', SORT_REGULAR);

        return $posts;
    }
}
