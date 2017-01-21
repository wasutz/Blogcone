<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTag;
use App\Tag;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);   
    }

    public function index()
    {
        $tags = Tag::paginate(20);

        return view('tags.index')->with('tags', $tags);
    }

    public function store(StoreTag $request)
    {
        Tag::create([
            'name' => $request->name
        ]);

        return redirect()->route('tags.index')
                         ->with('info', 'Create Tag Successful.');
    }

    public function destroy($id)
    {

    }
}