@extends('backend.layout.master')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Layanan</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('backend.services.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('backend.services.index') }}" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>
</div>
@endsection