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
       				 ->paginate(config('post.paginate'));
       				 
        $tags = Tag::all()->take(15);

        return view('index')->with(['posts' => $posts,
                                    'tags' => $tags]);
    }
}
