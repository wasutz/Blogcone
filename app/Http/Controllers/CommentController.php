<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function store(StoreComment $request)
    {
        $comment = new Comment;

        $comment->content = $request->content;
        $comment->user_id = $request->user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect()->route('posts.show', $request->post_id)
                         ->with('info', 'Comment Successful.');
    }

    public function destroy($id)
    {

    }
}