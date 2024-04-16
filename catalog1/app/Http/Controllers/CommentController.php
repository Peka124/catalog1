<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ]);

        Comment::create($request->all());

        return redirect()->back()->with('success', 'Comment is added');
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        return redirect()->back()->with('success', 'Comment updated');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment is deleted');
    }
}
