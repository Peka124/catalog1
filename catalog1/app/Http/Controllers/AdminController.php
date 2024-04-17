<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $comments = Comment::where('approved', false)->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function approveComment(Request $request, Comment $comment)
    {
        $request->validate([
            "approved"=>"required|boolean",
        ]);

        $comment->update(['approved' => true]);
        
        return redirect()->back()->with('success', 'Comment is approved');
    }

    public function showLoginForm()
    {
        return view("amdin.login");
    }

    public function login(Request $request)
    {
        $credentials=$request->only("email", "password");

        if(Auth::guard("admin")->attempt($credentdials)) {
            return redirect()->intended(route("admin.dashboard"));
        }

        return redirect()->back()->withErrors(["email"=>"Invalid credentials"]);
    }

    public function logout()
    {
        Auth::guard("admin")->logout();

        return redirect()->route("admin.login");
    }
}