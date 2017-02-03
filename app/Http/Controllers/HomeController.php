<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', config('post.published'))
        			 ->orderBy('id', 'desc')
       				 ->paginate(7);
       				 
        $tags = Tag::all()->take(10);

        return view('index')->with(['posts' => $posts,
                                    'tags' => $tags]);
    }
}
