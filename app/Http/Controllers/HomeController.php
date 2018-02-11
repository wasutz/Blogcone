<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', config('post.published'))
        			 ->latest()
        			 ->filter(request(['year', 'month']))
       				 ->paginate(config('post.paginate'));

        return view('index', compact('posts'));
    }
}