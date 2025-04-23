@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">✍️ Tambah Artikel Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" id="title" name="title" required placeholder="Masukkan judul artikel">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Artikel</label>
                        <textarea class="form-control" id="content" name="content" rows="6" required placeholder="Tulis isi artikel di sini..."></textarea>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-danger">← Kembali</a>
                        <button type="submit" class="btn btn-success">💾 Simpan Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
