<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $postCount = Post::count();
        $tagCount = Tag::count();

        return view('admin/index')->with([
                                        "postCount" => $postCount,
                                        "tagCount" => $tagCount
                                    ]);
    }

    public function review()
    {
        $posts = Post::where('published', config('post.review'));

        return view('admin/review')->with('posts', $posts);
    }
}
