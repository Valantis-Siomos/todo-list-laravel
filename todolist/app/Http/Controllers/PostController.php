<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // you can see all posts

        // $posts = Post::all();
        // return view('posts.index', compact('posts'));

        // you can see only the user posts

        // $posts = \App\Models\Post::where('user_id', Auth::id())->get();
        // return view('posts.index', compact('posts'));

        // $user = Auth::user();

        // $posts = $user->is_admin
        //     ? \App\Models\Post::all()  // Admin sees all posts
        //     : \App\Models\Post::where('user_id', $user->id)->get();  // Regular user sees their own

        // return view('posts.index', compact('posts'));
        $user = Auth::user();
        if ($user->is_admin) {
            // $posts = \App\Models\Post::all();
            $posts = Post::with('user')->latest()->get();
        } else {
            // $adminPosts = \App\Models\User::where('is_admin', 1)->pluck('id');
            // $posts = \App\Models\Post::whereIn('user_id', $adminPosts->push($user->id))->get();
            $posts = Post::where('user_id', Auth::id())->latest()->get();
        }
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // Post::create($request->all());
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('posts.index')->with('success', 'Post created');
    }

    // ayto einai gia to view to edit 
    public function edit($id)
    {
        // $post = Post::findOrFail($id);
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('posts.edit', compact('post'));
    }

    // ayto einai validate , save , redirect piso sto index

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // $post = Post::findOrFail($id);
        $post->update($request->only(['title', 'content']));

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    // public function destroy($id)
    // {
    //     // $post = Post::findOrFail($id);
    //     $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    //     $post->delete();

    //     return redirect()
    //         ->route('posts.index')
    //         ->with('success', 'Post deleted succefully.');
    // }

    public function destroy(Post $post)
{
    if (Auth::id() !== $post->user_id && !Auth::user()->is_admin) {
        abort(403, 'Unauthorized');
    }

    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
}
}
