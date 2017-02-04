<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Post;
use App\Tag;
use App\Like;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);   
        $this->middleware('admin', ['only' => ['postReview']]);   
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
        $post->published = $request->user()->getPublishedByRole();
        $post->save();

        $post->addTags($request->tags);

        return redirect()->route('posts.show', $post->id)
                         ->with('info', 'Create Successful.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if(!Auth::user()->hasAuthority($post)){
            abort(404);
        }

        return view('posts.edit')->with('post', $post);
    }

    public function update(StorePost $request, $id)
    {
        $post = Post::findOrFail($id);

        if(!Auth::user()->hasAuthority($post)){
            abort(404);
        }

        $post->tags()->detach();
        $post->addTags($request->tags);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return view('posts.show')->with([
                                    'post' => $post,
                                    'info' => 'Update Successful.'
                                ]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if(!Auth::user()->hasAuthority($post)){
            abort(404);
        }

        $post->tags()->detach();
        $post->delete();

        return redirect()->back()->with('info', 'Post Deleted.');
    }

    public function postLike($id)
    {
        $post = Post::findOrFail($id);

        if(!Auth::user()->hasLikedPost($post)){
            $post->likes()->create([
                'user_id' => Auth::id()
            ]);
        }

        $post->load('likes');

        return response()->json($post->likes);  
    }

    public function postReview($id)
    {
        $post = Post::findOrFail($id);

        $post->setPublished(config('post.published'));

        return redirect()->back()
                         ->with('info', 'Post already published.');
    }

    public function postCancel($id)
    {
        $post = Post::findOrFail($id);

        $post->setPublished(config('post.cancel'));

        return redirect()->back()
                         ->with('info', 'Post already cancel.');  
    }
}