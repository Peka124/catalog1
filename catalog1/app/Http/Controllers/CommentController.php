<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:80',
            'text' => 'required|string|min:20',
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
