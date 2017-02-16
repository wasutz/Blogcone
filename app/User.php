<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function isAdmin()
    {
        return $this->role_id === config('roles.admin');
    }

    public function getRoleName()
    {
        switch ($this->role_id) {
            case config('roles.admin'):
                return "Admin";
            case config('roles.super'):
                return "Super User";
            default:
                return "Basic User";
        }
    }

    public function getAvatarUrl() 
    {
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
    }

    public function hasLikedPost(Post $post)
    {
        return (bool) $post->likes->where('user_id', $this->id)->count();
    }

    public function getPublishedByRole()
    {
        if($this->role_id === config('roles.basic')){
            return config('post.review');
        }

        return config('post.published');
    }

    public function hasAuthority($object)
    {
        if($this->isAdmin()){
            return true;
        }

        if($object->user->id === $this->id){
            return true;
        }

        return false;
    }
}