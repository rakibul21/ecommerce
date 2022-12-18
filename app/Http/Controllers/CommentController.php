<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('comment.manage',['comments' => Comment::all()]);
    }

    public function commentStatus($commentId)
    {

        Comment::updateStatus($commentId);
        return redirect('/comment/manage')->with('message', 'comment status update successfully');
    }
}
