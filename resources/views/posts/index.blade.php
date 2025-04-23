@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">📰 Daftar Artikel</h1>

    @auth
        @if(auth()->user()->is_admin)
            <div class="text-end mb-4">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Tambah Artikel Baru</a>
            </div>
        @endif
    @endauth

    <div class="row g-4">
        @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Lihat Artikel</a>
                    </div>
                    <div class="card-footer text-muted small">
                        Dibuat oleh <strong>{{ $post->user->name }}</strong><br>
                        pada {{ $post->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div> --}}
@endsection
