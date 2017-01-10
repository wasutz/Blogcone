<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);   
    }

    public function index()
    {
        $posts = Auth::user()->posts()->paginate(7);

        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePost $request)
    {
        $post = Post::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'user_id' => $request->user()->id
                ]);

        return redirect()->route('posts.show', $post->id)
                         ->with('info', 'Create Successful.');
    }

    public function show($id)
    {
        $post = Post::find($id);

        if(!$post){
            abort(404);
        }

        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        if(!$post || !$this->isOwnerPost($post)){
            abort(404);
        }

        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post || !$this->isOwnerPost($post)){
            abort(404);
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        return view('posts.show')->with(['post' => $post,
                                         'info' => 'Update Successful.']);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if(!$post || !$this->isOwnerPost($post)){
            abort(404);
        }

        $post->delete();

        return redirect()->back()->with('info', 'Post Deleted.');
    }

    private function isOwnerPost($post){
        if(Auth::user()->isAdmin()){
            return true;
        }

        return $post->user == Auth::user();
    }
}
