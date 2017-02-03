<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCount = Post::count();
        $tagCount = Tag::count();

        return view('admin/index')->with([
                                        "postCount" => $postCount,
                                        "tagCount" => $tagCount
                                    ]);
    }
}
