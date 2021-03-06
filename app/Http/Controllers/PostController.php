<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Log;

class PostController extends Controller
{
    /**
     * Show all posts
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::paginate(10);
        return view('post.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id = 0)
    {
        return view('post.create')->withSelected($category_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'=>'required|exists:App\Category,id',
            'name'=>'required|max:255',
            'content'=>'required',
            'uploaded_file'=>'file'
        ]);

        $post = Post::create($request->all());

        $file = request()->file('uploaded_file');
        if ($file) {
            $fileName = "post{$post->id}file.{$file->extension()}";

            $file->storeAs('files', $fileName, 'public');
            $post->file_path = $fileName;
            $post->save();
        }

        return redirect(route('posts.show', ['post'=>$post]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.single')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'category_id'=>'required|exists:App\Category,id',
            'name'=>'required|max:255',
            'content'=>'required',
            'file'=>'file'
        ]);

        $post->update($request->all());
        return redirect(route('posts.show', ['post'=>$post]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $category = $post->category;
        $post->delete();
        return redirect(route('categories.show',['category'=>$category]));
    }
}
