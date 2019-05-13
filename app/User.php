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
    public function followers()
    {
        return $this->hasMany('App\Follower', 'UserId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function follows()
    {
        return $this->hasMany('App\Follower', 'FollowerId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'UserId', 'UserId');
    }

    /**
 *
 * Get the posts that $user is allowed to see
 * @param  User  $user
 * @return \Illuminate\Database\Eloquent\Collection
 */
    public function allowedPosts(User $user)
    {
        $viewRestrictionTypeIds = [5]; //Everyone
        if ($this->associates()->contains($user)) {
            $viewRestrictionTypeIds[] = 1; //Associates
            $viewRestrictionTypeIds[] = 2; //Associates and Associates of Associates
            $viewRestrictionTypeIds[] = 4; //Associates and followers
        }

        if ($this->followers()->get()->map(function ($follow) { return $follow->Follower; })->contains($user)) {
            $viewRestrictionTypeIds[] = 3; //Followers only
            $viewRestrictionTypeIds[] = 4; //Associates and followers
        }

        $allowedPosts = $this->posts()->whereIn('ViewRestrictionTypeId', $viewRestrictionTypeIds)->get();
        return $allowedPosts;
    }

    /**
     *
     * Check if can view post
     * @param  Post  $post
     * @return bool
     */
    public function canViewPost(Post $post)
    {
        $viewRestrictionTypeId = $post->ViewRestrictionTypeId;
        $posterAssociates = $post->User->associates();
        $isAssociated = $posterAssociates->contains($this);
        $isAssociateOfAssociates = false;
        $isFollowing = $post->User->followers()->get()->map(function ($follow) { return $follow->Follower; })->contains($this);

        if ($isAssociated) {
            foreach ($posterAssociates as $associate) {
                $isAssociateOfAssociates = $associate->associates()->contains($this);
                if ($isAssociated) {
                    break;
                }
            }
        }
        switch ($viewRestrictionTypeId) {
            case 1:
                return $isAssociated;
                break;
            case 2:
                return $isAssociated || $isAssociateOfAssociates;
                break;
            case 3:
                return $isFollowing;
                break;
            case 4:
                return $isAssociated || $isFollowing;
                break;
            case 5:
                return true;
                break;
        }
        return false;
    }

    public function feed()
    {
        //Get all users associated with and following
        $users = $this->associates()->union($this->follows()->get()->map(function ($follow) { return $follow->User; }));
        $posts = $this->posts()->get();


        foreach ($users as $user)
        {
            $posts = $posts->merge($user->allowedPosts($this));
        }

        $posts = $posts->sortByDesc('PostDate', SORT_REGULAR);

        return $posts;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function userMultimedia()
    {
        return $this->hasOne('App\UserMultimedia', 'UserId', 'UserId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOneThrough
     */
    public function multimedia()
    {
        return $this->hasOneThrough('App\Multimedia', 'App\UserMultimedia','UserId','MultiMediaId','UserId','MultiMediaId');
    }
}
