<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;

class CommentController extends Controller
{
    public function storeForPost(Request $request, Post $post)
    {
        $comment = $this->createComment($request);
        $post->comments()->save($comment);

        return response()->json($comment, 201);
    }

    public function storeForCategory(Request $request, Category $category)
    {
        $comment = $this->createComment($request);
        $category->comments()->save($comment);

        return response()->json($comment, 201);
    }

    private function createComment(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|alpha|max:255',
            'surname'=>'required|alpha|max:255',
            'content'=>'required',
        ]);

        $comment = new Comment();
        $comment->author = ucfirst(strtolower($request->name)).' '.ucfirst(strtolower($request->surname));
        $comment->content = $request->content;
        return $comment;
    }
}
