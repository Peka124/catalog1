<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $comments = Comment::where('approved', false)->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function approveComment(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return redirect()->back()->with('success', 'Comment is approved');
    }
}