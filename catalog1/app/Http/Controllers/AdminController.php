<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Admin;

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

    public function updateAdminPassword(Request $request, $userId)
    {
        // Retrieve the user from the database
        $user = Admin::find($userId);
    
        if (!$user) {
            // Handle case where user is not found
        }
    
        // Validate the incoming request data (you may have additional validation rules)
        $request->validate([
            'password' => 'required|string|min:8', // Adjust validation rules as needed
        ]);
    
        // Hash the password using Bcrypt
        $hashedPassword = Hash::make($request->password);
    
        // Update the user's password in the database
        $user->password = $hashedPassword;
        $user->save();
    
        // Redirect back or respond with success message
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