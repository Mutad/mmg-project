<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

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
            'firstName'=>'required|alpha|max:255',
            'lastName'=>'required|alpha|max:255',
            'content'=>'required',
        ]);

        $comment = new Comment();
        $comment->author = ucfirst(strtolower($request->firstName)).' '.ucfirst(strtolower($request->lastName));
        $comment->content = $request->content;
        return $comment;
    }
}
