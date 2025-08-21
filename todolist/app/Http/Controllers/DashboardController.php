<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized');
        }

        $totalPosts = Post::count();

        $postByUser = User::withCount('posts')->get();
        
        // return view('dashboard', compact('totalPosts', 'postsByUser'));
        return view('dashboard', ['totalPosts' => $totalPosts, 'postsByUser' => $postByUser]);
    }
}
