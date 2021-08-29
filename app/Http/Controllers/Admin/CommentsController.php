<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::with(['author', 'post'])->paginate(15);
        return view('admin.comments.index',compact('comments'));
    }

    public function toggle($id)
    {
        $comment = Comment::find($id);
        $comment->toggleStatus();
        return redirect()->back()->with('success', 'Статус коментария изменён!!!');
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect()->back()->with('success', "Коментарий был удален!!! ");
    }
}
