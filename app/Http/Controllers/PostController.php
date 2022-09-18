<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // $this->authorize('author', $post);
        if ($post->public == '0') {
            abort(404);
        }
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        // dd($request->all(), $post);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.show', $post);
    }

    public function store(PostRequest $request)
    {
        // dd($request->all());
        $post = new Post($request->all());
        // $post = $request->all();
        $post->user_id = Auth::user()->id;
        // dd($post);


        $post->save();
        
        return redirect()->route('posts.show', $post);
    }
}
