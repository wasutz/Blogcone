<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $postInReview = Post::getPostByStatus(config('post.review'))->count();
        $postPublished = Post::getPostByStatus(config('post.published'))->count();
        $tagCount = Tag::count();

        return view('admin/index')->with([
                                        "postInReview" => $postInReview,
                                        "postPublished" =>   $postPublished,
                                        "tagCount" => $tagCount
                                    ]);
    }

    public function review()
    {
        $posts = Post::where('published', config('post.review'))
                     ->paginate(10);

        return view('admin/review')->with('posts', $posts);
    }

    public function posts()
    {
        $posts = Post::paginate(10);

        return view('admin/posts')->with('posts', $posts);
    }

    public function tags()
    {
        $tags = Tag::paginate(10);

        return view('admin/tags')->with('tags', $tags);
    }

    public function users()
    {
        $users = User::where('role_id', '!=', config('roles.admin'))
                     ->paginate(10);

        return view('admin/users')->with('users', $users);
    }
}