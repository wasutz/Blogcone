<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'published'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    public function getLikes()
    {
        return $this->likes()->count();
    }

    public function addTags($tags)
    {
        if(!$tags){
            return;
        }

        foreach($tags as $tag){
            $find = Tag::firstOrCreate(['name' => $tag]);

            $this->tags()->attach($find);
        }
    }
}
