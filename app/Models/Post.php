<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use Carbon\Carbon;

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
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getLikes()
    {
        return $this->likes()->count();
    }

    public function triggerLike($user)
    {
        if(!$this->isLiked($user)){
            $this->like($user);
        }else{
            $this->unlike($user);
        }
    }

    public function like($user)
    {
        $this->likes()->create([
            'user_id' => $user->id
        ]);
    }

    public function unlike($user)
    {
        $this->likes()->where('user_id', $user->id)->delete();
    }

    public function isLiked($user)
    {
        return (bool) $this->likes()->where('user_id', $user->id)->count();
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

    public function setPublished($published)
    {
        $this->published = $published;
        $this->save();
    }

    public function scopeFilter($query, $filters)
    {
        if($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']){
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                     ->where('published', config('post.published'))
                     ->groupBy('year', 'month')
                     ->orderByRaw('min(created_at) desc')
                     ->get()
                     ->toArray();
    }

    public static function getPostByStatus($status)
    {
        $posts = Post::where('published', $status);

        return $posts;
    }
}
