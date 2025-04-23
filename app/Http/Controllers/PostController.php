<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;    
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function adminIndex()
    {
        // Ambil semua post, bisa tambahin pagination juga kalau mau
        $posts = \App\Models\Post::with('user')->latest()->paginate(5);

        return view('posts.admin', compact('posts'));
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth::user()->id, // Ambil ID user yang sedang login
        ]);

        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->only('title', 'content'));

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil dihapus.');
    }

}
