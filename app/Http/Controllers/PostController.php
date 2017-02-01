<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);   
    }

    public function index()
    {
        $posts = Auth::user()->posts()->orderBy('id', 'desc')->paginate(7);

        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePost $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user()->id;
        $post->published = 1;
        $post->save();

        $post->addTags($request->tags);

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

    public function update(StorePost $request, $id)
    {
        $post = Post::find($id);

        if(!$post || !$this->isOwnerPost($post)){
            abort(404);
        }

        $post->tags()->detach();
        $post->addTags($request->tags);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return view('posts.show')->with(['post' => $post,
                                         'info' => 'Update Successful.']);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();

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
