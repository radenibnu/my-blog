<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->create([
            'user_id' => Auth::user()->id, // Ambil ID user yang sedang login
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Artikel berhasil di-like!');
}
}
