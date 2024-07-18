<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    

    public function index(Film $film){
        $comments = $film->comments()->orderBy('created_at')->get();
        return response()->json($comments);
    }

    public function store(Request $request,Film $film){
         $request->validate(['comment'=>'required|string|max:500',]);

         $comment = new Comment();
         $comment->film_id=$film->id;
         $comment->comment =$request->comment;
         $comment->save();

         return response()->json([
            'message' => 'Comment pushed successfully',
            'comment' => $comment
        ], 201);
    }

    
}
