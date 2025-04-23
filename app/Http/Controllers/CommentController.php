<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'user_id' => auth::user()->id, // Ambil ID user yang sedang login
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Komentar berhasil ditambahkan!');
    }
}
