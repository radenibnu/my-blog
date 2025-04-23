@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">{{ $post->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Ditulis oleh:</strong> {{ $post->user->name }}</p>
            <p><strong>Dipublikasikan pada:</strong> {{ $post->created_at->format('d M Y') }}</p>

            <hr>

            <p>{{ $post->content }}</p>

            <!-- Form Like -->
            @auth
                <form action="{{ route('likes.store', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">👍 Like</button>
                </form>
            @endauth

            <hr>

            <!-- Komentar -->
            <h5>Komentar:</h5>
            @foreach ($post->comments as $comment)
                <div class="mb-3">
                    <p><strong>{{ $comment->user->name }}</strong> berkata:</p>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach

            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" name="content" rows="3" placeholder="Tulis komentar..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                </form>
            @endauth

            <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4">← Kembali ke Daftar Artikel</a>
        </div>
    </div>
</div>
@endsection
