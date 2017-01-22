<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }
}
