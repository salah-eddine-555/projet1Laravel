<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $validated = $request->validate([
    //         'titre'=> 'string|max:255',
    //         'content'=> 'text',
    //     ]);

    //     Post::create($validated);

    //     return redirect()->route('posts.index');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        return views('posts.edit', compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Post $post)
    {
        //
        $validated = $request->validate([
            'titre'=> 'string|max:255',
            'content'=> 'text',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function create(Request $request){

        $validated  = $request->validate([
            'titre'=> "string|min:30|max:255"
        ]);

        Post::create($validated);

        return redirect()->route('index.posts');

    }
}
