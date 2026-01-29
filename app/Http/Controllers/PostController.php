<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Categorie;

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
        $categories = Categorie::all();
        return view("posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'titre'=> 'required|string|max:255',
            'content'=> 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('images', $name, 'public');
            $validated['image'] = $path;
            // dd($file);
            // dd($name);   
        }
        
        
        
        Post::create($validated);
       

        return redirect()->route('posts.index');
    }

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
    public function edit(Post $post,Categorie $categorie)
    {       
       $categories = Categorie::all();
        return view('posts.edit', compact(['post', 'categorie','categories']));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Post $post)
    {
        //
        $validated = $request->validate([
            'titre'=> 'string|max:255',
            'content'=> 'required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

}
