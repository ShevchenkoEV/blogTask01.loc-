<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public  function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $comment = new Comment;
        $comment->content = $request->message;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect()->back()->with('success', 'Ваш коментарий скоро будет добавлен!!!');



    }
}
