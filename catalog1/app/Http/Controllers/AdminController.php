<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

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
        return view("admin.login");
    }

    public function login(Request $request)
    {
        $credentials=$request->only("email", "password");

        if(Auth::guard("admin")->attempt($credentials)) {
            return redirect()->intended(route("admin.dashboard"));
        }

        return redirect()->back()->withErrors(["email"=>"Invalid credentials"]);
    }

    public function logout()
    {
        Auth::guard("admin")->logout();

        return redirect()->route("admin.login");
    }

    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();

        // You can add more data fetching logic here as needed

        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'totalUsers'));
    }
}